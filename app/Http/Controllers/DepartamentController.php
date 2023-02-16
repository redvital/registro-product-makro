<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\LogSistema;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:departaments.index')->only('index');
        $this->middleware('can:departaments.create')->only('create','store');
        $this->middleware('can:departaments.edit')->only('edit','update');
        $this->middleware('can:departaments.destroy')->only('destroy');

    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de departamentos: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departaments = Departament::all();

        return view ('departaments.index', compact('departaments'));
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para registrar un nuevo departamento: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('departaments.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:departaments',
            'description' => 'required'
        ]);

        Departament::create($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha  registrado un nuevo departamento: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('departaments.index')->with('success', 'El departamento se creo con exito...');
    }

    public function edit(Departament $departament)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para editar un departamento: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('departaments.edit', compact('departament'));
        
    }

    public function update(Request $request,Departament  $departament)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:departaments,slug,$departament->id",
            'description' => 'required'

        ]);

        $departament->update($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha actualizado un departamento: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('departaments.index', $departament)->with('success', 'El departamento se actualizó con exito...');
    }

    public function destroy(Departament $departament)
    {
        $departament->delete();

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha eliminado una categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('departaments.index')->with('success', 'El departamento se eliminó con exito...');
    }
}
