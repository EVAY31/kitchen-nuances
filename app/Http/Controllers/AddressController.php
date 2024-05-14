<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\AddressRequest;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return auth()->user()->addresses;
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
    public function store(AddressRequest $request)
    {
        $address = $request->validated()['address'];

        return auth()->user()->addresses()->create($address);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address): Address
    {
        return $address;
    }

//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(User_addresses $user_addresses)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $data = $request->validated()['address'];

        $address->address = $data;
        $address->save();


        return redirect()->route('addresses.index')->with('success', 'Адрес успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address): RedirectResponse
    {
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Адрес успешно удален');
    }
}
