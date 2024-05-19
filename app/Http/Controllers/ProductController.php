<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index(): array|Collection
    public function index(): Application|Factory|View
    {
//        return Product::all();
//        $product = Product::all();
//        return view('index', compact('product'));
        $products = Product::paginate(12);
//        $products = Product::all(); // Отображает 10 продуктов на странице
        $basket = auth()->user()->basket ?? null;
        return view('products.index', compact('products', 'basket'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product): Application|Factory|View
    {
//        return $product;
        return view('products.show', compact('product'));
    }
}
