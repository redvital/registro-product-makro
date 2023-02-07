<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LogSistema;
use Illuminate\Http\Request;
use App\Models\Statu;

class StatuController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:status.index')->only('index');
        $this->middleware('can:status.create')->only('create','store');
        $this->middleware('can:status.edit')->only('edit','update');
        $this->middleware('can:status.destroy')->only('destroy');

    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('status.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para registrar un nuevo estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('status.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'slug' => 'required|unique:status',
            'type' => 'required'
        ]);

        Statu::create($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha  registrado un nuevo estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('status.index')->with('success', 'El Estatus se creo con exito...');
    }

    public function edit(Statu $status)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para editar un estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('status.edit', compact('status'));
    }

    public function update(Request $request,Statu  $status)
    {
        $request->validate([
            'description' => 'required',
            'slug' => "required|unique:status,slug,$status->id",
            'type' => 'required'
        ]);

        $status->update($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha actualizado un estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('status.index', $status)->with('success', 'El Estatus se actualizó con exito...');
    }

    public function destroy(Statu $status)
    {
        $status->delete();

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha eliminado un estatus: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('status.index')->with('success', 'El Estatus se eliminó con exito...');
    }
}
