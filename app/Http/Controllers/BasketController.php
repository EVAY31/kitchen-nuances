<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\BasketStoreRequest;
use App\Http\Requests\Basket\BasketUpdateRequest;
use App\Models\Basket;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(BasketStoreRequest $request): Basket|RedirectResponse
    {
        $data = $request->validated();

        try {
            $basket = new Basket();

            $basket->price = $data['price'];
            $basket->user_id = $data['user_id'] ?? null;
            $basket->save();
            $basket->products()->attach($data['product_id']);
            $basket->load('products');

            return $basket;
        } catch (Exception $exception) {
            Log::error('Ошибка создания корзины: ' . $exception);

            return redirect()->route('home_page');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Basket $basket): Factory|Application|View
    {
        return view('baskets.show', compact('basket'));
    }

    public function update(BasketUpdateRequest $request, Product $product, Basket $basket): RedirectResponse
    {
        $action = $request->validated();

        // Если корзина существует
        if ($action === 'remove') {
            // Уменьшаем количество на единицу при действии "вычитание"
            $product_quantity = max($basket->pivot->where('product_id', $product->id)->quantity--, 0);

            if ($product_quantity === 0) {
                $basket->products()->detach($product->id);
            }
        } elseif ($action === 'add') {
            // Увеличиваем количество на единицу при действии "добавление"
            $basket->pivot->where('product_id', $product->id)->quantity++;
        }

        if ($basket->products->count() === 0) {
            // Если количество стало 0, удаляем продукт из корзины
            $this->destroy($basket);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basket $basket): RedirectResponse
    {
        $basket->delete();

        return redirect()->route('home_page');
        // на что ссылаться...
    }
}
