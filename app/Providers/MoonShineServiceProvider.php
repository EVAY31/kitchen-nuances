<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Phone;
use App\Models\Product;
use App\Models\User;
use App\MoonShine\Resources\AddressResource;
use App\MoonShine\Resources\PhoneResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuGroup::make('Kitchen-nuances', [
//                MenuItem::make('Бренды', new BrandResource())
//                    ->badge(fn() => Brand::count())
//                    ->icon('heroicons.check-badge'),
//                MenuItem::make('Категории', new CategoryResource())
//                    ->badge(fn() => Category::count())
//                    ->icon('heroicons.list-bullet'),
//                MenuItem::make('Продукты', new ProductResource())
//                    ->badge(fn() => Product::count())
//                    ->icon('heroicons.inbox-arrow-down'),
                MenuItem::make('Телефоны', new PhoneResource())
                    ->badge(fn() => Phone::count())
                    ->icon('heroicons.phone'),
                MenuItem::make('Адреса', new AddressResource())
                    ->badge(fn() => Address::count())
                    ->icon('heroicons.map-pin'),
                MenuItem::make('Пользователи', new UserResource())
                    ->badge(fn() => User::count())
                    ->icon('heroicons.user-group'),
            ])
                ->icon('heroicons.bars-4'),

//            MenuItem::make('Documentation', 'https://moonshine-laravel.com')
//               ->badge(fn() => 'Check'),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
