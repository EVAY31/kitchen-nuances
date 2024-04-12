<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return Brand::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): array|Collection
    {
        return $brand->with('products')->get();
    }
}
