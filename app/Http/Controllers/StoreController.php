<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:stores.index')->only('index');
    //     $this->middleware('can:stores.create')->only('create','store');
    //     $this->middleware('can:stores.edit')->only('edit','update');
    //     $this->middleware('can:stores.destroy')->only('destroy');

    // }

    public function index()
    {
        $stores = Store::all();

        return view ('stores.index', compact('stores'));
    }

    public function create()
    {
        return view ('stores.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:stores',
            'address' => 'required'
        ]);

        Store::create($request->all());

        return redirect()->route('stores.index')->with('info', 'La tienda se creo con exito...');
    }

    public function edit(Store $store)
    {
        return view ('stores.edit', compact('store'));
        
    }

    public function update(Request $request,Store  $store)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:stores,slug,$store->id",
            'address' => 'required'

        ]);

        $store->update($request->all());
        return redirect()->route('stores.index', $store)->with('info', 'La tienda se actualizó con exito...');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')->with('info', 'La tienda se eliminó con exito...');
    }
}
