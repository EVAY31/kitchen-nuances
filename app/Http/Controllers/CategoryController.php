<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
//        return Category::all();
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
//    public function show(Category $category): Application|Factory|View
//    {
//        $category->load('products');
//        return view('categories.show', compact('category'));
//    }

//    public function show($category): Factory|Application|View
//    {
//        $category = Category::findOrFail($category);
//        $products = $category->products; // Предполагается, что у категории есть отношение к продуктам
//
//        return view('categories.show', compact('category', 'products'));
//    }
    public function show($category): Factory|Application|View
    {
        $category = Category::findOrFail($category);
        $products = $category->products; // Получаем все продукты для данной категории
        return view('categories.show', compact('category', 'products'));
    }
}

