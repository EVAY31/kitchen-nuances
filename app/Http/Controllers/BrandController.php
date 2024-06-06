<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
//        return Brand::all();
//        $brands =  Brand::all();
        $brands =  Brand::paginate(6);
        return view('brands.index', compact('brands'));
    }

    /**
     * Display the specified resource.
     */
//    public function show(Brand $brand): Application|Factory|View
//    {
////        return $brand->with('products')->get();
//        $brand->load('products');
//        return view('brands.show', compact('brand'));
//    }

    public function show($brands): Factory|Application|View
    {
        $brands = Brand::findOrFail($brands);
        $products = $brands->products; // Получаем все продукты для данной категории
        return view('brands.show', compact('brands', 'products'));
    }
}
