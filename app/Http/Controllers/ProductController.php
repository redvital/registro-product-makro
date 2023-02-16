<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\IncidenceMail;
use App\Models\Category;
use App\Models\Incidence;
use App\Models\LogSistema;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:products.index')->only('index');
        $this->middleware('can:products.create')->only('create', 'store');
        $this->middleware('can:products.edit')->only('edit', 'update');
        $this->middleware('can:products.destroy')->only('destroy');
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . '-' . auth()->user()->last_name . ' Ha ingresado a ver la lista de incidencias reportadas: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('products.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . '-' . auth()->user()->last_name . ' Ha ingresado al formulario para reportar una nueva incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $stores  = DB::table('stores')->pluck('name', 'id');
        $categories  = DB::table('categories')->pluck('name', 'id');
        $incidences  = DB::table('incidences')->pluck('type', 'id');
        // $status  = DB::table('status')->pluck('type' , 'id');

        return view('products.create', compact('stores', 'categories', 'incidences'));
    }

    public function show(Product $product)
    {
        $stores  = DB::table('stores')->pluck('name', 'id');
        $categories  = DB::table('categories')->pluck('name', 'id');
        $user  = DB::table('users')->pluck('name', 'id');
        $incidences  = DB::table('incidences')->pluck('type', 'id');
        $status  = DB::table('status')->pluck('type', 'id');

        return view('products.show', compact('stores', 'categories', 'incidences', 'product', 'status', 'user'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'file' => 'nullable|image',
            'sku' => 'nullable',
            'slug' => 'required|unique:products',
            'store_id' => 'required|not_in:0',
            'category_id' => 'required|not_in:0',
            'incidence_id' => 'required|not_in:0',
            'description' => 'required'
        ]);
        $product = new Product;
        $product->name = $data['name'];
        $product->sku = $data['sku'];
        $product->slug = $data['slug'];
        $product->store_id = $data['store_id'];
        $product->category_id = $data['category_id'];
        $product->incidence_id = $data['incidence_id'];
        $product->description = $data['description'];


        $user = auth()->user();

        $data['user_id'] = $user->id;
        $data['status_id'] = 1;
        $product = Product::create($data);

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));

            $product->image()->create([
                'url' => $url
            ]);
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . '-' . auth()->user()->last_name . ' Ha  reportado una nueva incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        // Después de guardar el producto...

        // Obtiene el nombre de la tienda correspondiente
        $storeName = Store::findOrFail($data['store_id'])->name;

        // Obtiene el nombre de la incidencia correspondiente
        $incidenceName = Incidence::findOrFail($data['incidence_id'])->type;
        $categoryName = Category::findOrFail($data['category_id'])->name;

        // Envía un correo electrónico de notificación
        $mailData = [
            'name' => $product->name,
            'sku' => $product->sku,
            'slug' => $product->slug,
            'storeName' => $storeName,
            'categoryName' => $categoryName,
            'incidenceName' => $incidenceName,
            'description' => $product->description,
            'imageUrl'=>$product->image ? Storage::url($product->image->url) : null,
        ];

        Mail::to('juanjosexdd7@gmail.com')->send(new IncidenceMail($mailData));

        return redirect()->route('products.index')->with('success', 'La incidencia se creo con exito...');
    }

    public function edit(Product $product)
    {
        $stores  = DB::table('stores')->pluck('name', 'id');
        $categories  = DB::table('categories')->pluck('name', 'id');
        $incidences  = DB::table('incidences')->pluck('type', 'id');
        $status  = DB::table('status')->pluck('type', 'id');

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . '-' . auth()->user()->last_name . ' Ha ingresado al formulario para editar una incidencia reportada: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('products.edit', compact('product', 'stores', 'categories', 'incidences', 'status'));
    }

    public function update(Request $request, Product  $product)
    {
        // dd($product);


        $product->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));
            if ($product->image) {
                Storage::delete($product->image->url);

                $product->image->update([
                    'url' => $url
                ]);
            } else {
                $product->image()->create([
                    'url' => $url
                ]);
            }
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . '-' . auth()->user()->last_name . ' Ha actualizado una incidencia reportada: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('products.index')->with('success', 'La incidencia se actualizó con exito...');
    }

    // public function destroy(Product $product)
    // {
    //     $product->delete();

    //     return redirect()->route('products.index')->with('success', 'La incidencia se eliminó con exito...');
    // }
}
