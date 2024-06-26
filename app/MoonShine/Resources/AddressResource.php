<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Address>
 */
class AddressResource extends ModelResource
{
    protected string $model = Address::class;

    protected string $title = 'Addresses';

    public string $column = 'address';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsToMany::make('Пользователь', 'users', resource: new UserResource())
                    ->selectMode()
                    ->placeholder('Кликните или начните ввод для поиска')
                    ->inLine(separator: ' ', badge: true),

                Text::make('Адрес', 'address'),
            ])
        ];
    }

    /**
     * @param Address $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
