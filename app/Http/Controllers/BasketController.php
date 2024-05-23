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
use Illuminate\Support\Facades\DB;
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
            $product = Product::query()->find($data['product_id']);
            $basket = new Basket();

            $basket->user_id = $data['user_id'] ?? null;
            $basket->save();
            $basket->products()->attach($data['product_id'], ['price' => $product->price, 'quantity' => 1]);
            $basket->load('products');

//            return $basket;
            return redirect()->route('basket.show', $basket->id)
                ->with('success', 'Продукт успешно добавлен в корзину');
        } catch (Exception $exception) {
            Log::error('Ошибка создания корзины: ' . $exception);

            return redirect()->route('home_page');
        }
        return view('basket.store', compact('basket'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Basket $basket): Application|Factory|View
    {
//        return $basket->load('products');
//        return view('baskets.show', compact('basket'));
//        return view('products.show', compact('product', 'products'));
        $basket->load('products');
        return view('basket.show', compact('basket'));
    }

    public function update(BasketUpdateRequest $request, Basket $basket, Product $product): RedirectResponse
    {
        $action = $request->validated()['action'];

        if ($action === 'remove') {
            // Уменьшаем количество на единицу при действии "вычитание"
            max(
                $basket
                    ->products()
                    ->updateExistingPivot(
                        $product->id,
                        [
                            'quantity' => DB::raw('quantity - 1')
                        ]
                    ),
                0
            );

            $product_quantity = $basket
                ->products()
                ->where('product_id', $product->id)
                ->first()
                ->pivot
                ->quantity;

            if ($product_quantity === 0) {
                $basket->products()->detach($product->id);
            }

            if ($basket->products->count() === 0) {
                // Если количество стало 0, удаляем продукт из корзины
                $this->destroy($basket);
            }
        } elseif ($action === 'add') {
            if ($basket->products->contains($product)) {
                // Увеличиваем количество на единицу при действии "добавление"
                $basket->products()->updateExistingPivot($product->id, ['quantity' => DB::raw('quantity + 1')]);
            } else {
                $basket->products()->attach($product->id, ['price' => $product->price, 'quantity' => 1]);
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basket $basket): RedirectResponse
    {
        $basket->deleteWithProducts();

        return redirect()->route('home_page');
        // на что ссылаться...
    }
}
