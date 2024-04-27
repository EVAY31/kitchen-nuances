<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phone\PhoneRequest;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return auth()->user()->phones;
    }

//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhoneRequest $request)
    {
        $phone = $request->validated()['phone'];

        return auth()->user()->phones()->create($phone);
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone): Phone
    {
        return $phone;
    }

//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Phone $phone)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhoneRequest $request, Phone $phone): RedirectResponse
    {
        $data = $request->validated()['phone'];

        $phone->phone = $data;
        $phone->save();


        return redirect()->route('phones.index')->with('success', 'Телефон успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone): RedirectResponse
    {
        $phone->delete();

        return redirect()->route('phones.index')->with('success', 'Телефон успешно удален');
    }
}
