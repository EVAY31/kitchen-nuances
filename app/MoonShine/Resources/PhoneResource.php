<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Phone>
 */
class PhoneResource extends ModelResource
{
    protected string $model = Phone::class;

    protected string $title = 'Phones';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Пользователь', 'user', resource: new UserResource())
                    ->placeholder('Кликните или начните ввод для поиска'),
                Text::make('Телефон', 'phone')
                    ->mask('+79999999999'),
        ]),
        ];
    }

    /**
     * @param Phone $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
