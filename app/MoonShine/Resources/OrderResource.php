<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Order>
 */
class OrderResource extends ModelResource
{
    protected string $model = Order::class;

    protected string $title = 'Orders';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Пользователь', 'user', resource: new UserResource())
                    ->disabled(),
                Text::make('Адрес', 'address')
                    ->disabled(),
                Number::make('Итоговая цена', 'final_price')
                    ->disabled(),
                BelongsToMany::make('Товары', 'products', resource: new ProductResource())
                    ->selectMode()
                    ->inLine(separator: ' ', badge: true)
                    ->disabled()
                    ->hideOnIndex(),
                Select::make('Статус', 'status')
                    ->options([
                        Order::NEW => 'Новый',
                        Order::COLLECTED => 'Собран',
                        Order::COMPLETED => 'Завершён',
                        Order::CANCELLED => 'Отменён',
                    ])
                    ->required(),
            ]),
        ];
    }

    /**
     * @param Order $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array
    {
        return ['view', 'update', 'delete'];
    }
}
