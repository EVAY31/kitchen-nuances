<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array|Collection

    {
        return Product::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Product
    {
        return $product;
    }
}
