<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use MoonShine\Fields\Password;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')
                    ->required()
                    ->sortable(),
                Slug::make('Читаемая ссылка', 'slug')
                    ->unique()
                    ->from('name')
                    ->hint('Заполнится автоматически, если оставить пустым'),
                Text::make('Email', 'email')
                    ->rules('required', 'email', 'max:255', 'unique:users,email')
                    ->sortable(),
                Password::make('Password', 'password')
                    ->rules('required', 'confirmed', 'min:8')
                    ->onlyOnForms()
                    ->dehydrateUsing(fn ($value) => Hash::make($value)),
                Text::make('Phone', 'phone')
                    ->rules('required', 'max:255')
                    ->sortable(),
                Text::make('Address', 'address')
                    ->rules('required', 'max:255')
                    ->sortable(),
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
