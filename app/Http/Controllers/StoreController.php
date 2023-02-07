<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LogSistema;
use App\Models\Statu;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:stores.index')->only('index');
        $this->middleware('can:stores.create')->only('create','store');
        $this->middleware('can:stores.edit')->only('edit','update');
        $this->middleware('can:stores.destroy')->only('destroy');

    }

    public function index()
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de tiendas: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $stores = Store::all();

        return view ('stores.index', compact('stores'));
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para registrar una nueva tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('stores.create');
        
    }

    public function incidencestore(Store $store)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver las incidencias de una tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $statuses = Statu::all();
        return view ('stores.incidence-store', compact('store','statuses'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:stores',
            'address' => 'required'
        ]);

        Store::create($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha  registrado una nueva tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        return redirect()->route('stores.index')->with('info', 'La tienda se creo con exito...');
    }

    public function edit(Store $store)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para editar una tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
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

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha actualizado una tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return redirect()->route('stores.index', $store)->with('info', 'La tienda se actualizó con exito...');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha eliminado un tienda: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('stores.index')->with('info', 'La tienda se eliminó con exito...');
    }
}
