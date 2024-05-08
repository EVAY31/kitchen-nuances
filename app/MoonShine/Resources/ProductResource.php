<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'title')
                    ->required()
                    ->sortable(),
                Slug::make('Читаемая ссылка', 'slug')
                    ->unique()
                    ->from('title')
                    ->hint('Заполниться автоматически, если оставить пустым'),
                Image::make('Картинка', 'image')
                    ->required()
                    ->hideOnIndex(),
                TinyMce::make('Краткое описание', 'description')
                    ->hideOnIndex(),
                TinyMce::make('Текст', 'characteristics')
                    ->required()
                    ->hideOnIndex(),
                Text::make('Цена', 'price')
                    ->required(),
//                цена
                BelongsToMany::make('Категории', 'categories', resource: new CategoryResource())
                    ->selectMode()
                    ->placeholder('Кликните или начните ввод для поиска')
                    ->inLine(badge: true),
                BelongsTo::make('Бренд', 'brands', resource: new BrandResource())
                    ->selectMode()
                    ->placeholder('Кликните или начните ввод для поиска')
                    ->inLine(badge: true),
            ]),
        ];
    }

    /**
     * @param Product $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
