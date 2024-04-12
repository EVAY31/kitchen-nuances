<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\BasketStoreRequest;
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
            $basket->total_quantity = $data['quantity']; //ToDo надо высчитывать
            $basket->user_id = $data['user_id'];
            $basket->products()->attach($data['product_id']);
            $basket->save();
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

    public function update(Request $request, Product $product, ?Basket $basket): RedirectResponse
    {
        $quantity = $request->input('quantity', 1);
        $action = $request->input('action');

        if ($basket) {
            // Если корзина существует
            if ($action === 'remove') {
                // Уменьшаем количество на единицу при действии "вычитание"
                $quantity = max($basket->quantity - 1, 0);
            } elseif ($action === 'add') {
                // Увеличиваем количество на единицу при действии "добавление"
                $quantity = $basket->quantity + 1;
            }

            if ($quantity === 0) {
                // Если количество стало 0, удаляем продукт из корзины
                $basket->delete();
            } else {
                $basket->quantity = $quantity;
                $basket->save();
            }
        } elseif ($product->exists) {
            // Если корзины нет, но продукт существует, создаем новую запись в корзине
            $basket = new Basket([
                'quantity' => 1,
                'product_id' => $product->id,
                'user_id' => auth()->id(),
            ]);
            $basket->save();
        } else {
            // Если ни корзины, ни продукта не существует, удаляем корзину
            if ($basket) {
                $basket->delete();
            }
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
