<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incidence;
use App\Models\LogSistema;

class IncidenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:incidences.index')->only('index');
        $this->middleware('can:incidences.create')->only('create','store');
        $this->middleware('can:incidences.edit')->only('edit','update');
        $this->middleware('can:incidences.destroy')->only('destroy');

    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista del maestro incidencias: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        $incidences = Incidence::all();

        return view ('incidences.index', compact('incidences'));
    }

    public function create()
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario del maestro para registrar una nueva incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('incidences.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'slug' => 'required|unique:incidences',
            'type' => 'required'
        ]);

        Incidence::create($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha  registrado un nuevo maestro para incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('incidences.index')->with('success', 'La incidencia se creo con exito...');
    }

    public function edit(Incidence $incidence)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para editar un maestro incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('incidences.edit', compact('incidence'));
        
    }

    public function update(Request $request,Incidence  $incidence)
    {
        $request->validate([
            'description' => 'required',
            'slug' => "required|unique:incidences,slug,$incidence->id",
            'type' => 'required'
        ]);

        $incidence->update($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha actualizado un maestro incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('incidences.index', $incidence)->with('success', 'La incidencia se actualizó con exito...');
    }

    public function destroy(Incidence $incidence)
    {
        $incidence->delete();
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha eliminado un maestro incidencia: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('incidences.index')->with('success', 'La incidencia se eliminó con exito...');
    }
}
