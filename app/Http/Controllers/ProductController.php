<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:products.index')->only('index');
        $this->middleware('can:products.create')->only('create','store');
        $this->middleware('can:products.edit')->only('edit','update');
        $this->middleware('can:products.destroy')->only('destroy');

    }

    public function index()
    {
        return view ('products.index');
    }

    public function create()
    {
        $stores  = DB::table('stores')->pluck('name' , 'id');
        $categories  = DB::table('categories')->pluck('name' , 'id');
        $incidences  = DB::table('incidences')->pluck('type' , 'id');

        return view ('products.create',compact('stores','categories','incidences'));
        
    }

    public function show(Product $product)
    {
        $stores  = DB::table('stores')->pluck('name' , 'id');
        $categories  = DB::table('categories')->pluck('name' , 'id');
        $incidences  = DB::table('incidences')->pluck('type' , 'id');
        return view('products.show',compact('stores','categories','incidences','product'));

    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'slug' => 'required|unique:products',
            'store_id' => 'required|not_in:0',
            'category_id' => 'required|not_in:0',
            'incidence_id' => 'required|not_in:0',
            'description' => 'required'
        ]);

        

        $user = auth()->user();
        
        $data['user_id'] = $user->id;

        $product = Product::create($data);

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));

            $product->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('products.index')->with('success', 'La incidencia se creo con exito...');
    }

    public function edit(Product $product)
    {
        $stores  = DB::table('stores')->pluck('name' , 'id');
        $categories  = DB::table('categories')->pluck('name' , 'id');
        $incidences  = DB::table('incidences')->pluck('type' , 'id');
        return view ('products.edit', compact('product','stores','categories','incidences'));
        
    }

    public function update(Request $request,Product  $product)
    {
        // dd($product);

        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'slug' => 'required|max:255|unique:products,slug,'.$product->id,
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'incidence_id' => 'required|exists:incidences,id',
            'description' => 'required',
        ]);
        $product->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));
            if ($product->image) {
                Storage::delete($product->image->url);

                $product->image->update([
                    'url' => $url
                ]);
            }else{
                $product->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'La incidencia se actualizó con exito...');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'La incidencia se eliminó con exito...');
    }
}
