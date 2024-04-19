<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Basket;
use App\Models\Order;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders;

        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request, Basket $basket)
    {
        $data = $request->validated();

        try {
            $order = new Order();

            $order->user_id = $data['user_id'] ?? null;
            $order->obtaining_method_id = $data['obtaining_method_id'];
            $order->address = $data['address'] ?? null;
            $order->save();
            foreach ($basket->products as $product) {
                $order->products()->attach($product->id, ['price' => $product->pivot->price, 'quantity' => $product->pivot->quantity]);
            }
            $order->load('products');

            return $order;
        } catch (Exception $exception) {
            Log::error('Ошибка создания заказа: ' . $exception);

            return redirect()->route('home_page');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): Order
    {
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('home_page');
    }
}
