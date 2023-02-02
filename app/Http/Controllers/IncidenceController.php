<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incidence;

class IncidenceController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:incidences.index')->only('index');
    //     $this->middleware('can:incidences.create')->only('create','store');
    //     $this->middleware('can:incidences.edit')->only('edit','update');
    //     $this->middleware('can:incidences.destroy')->only('destroy');

    // }

    public function index()
    {
        $incidences = Incidence::all();

        return view ('incidences.index', compact('incidences'));
    }

    public function create()
    {
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

        return redirect()->route('incidences.index')->with('success', 'La incidencia se creo con exito...');
    }

    public function edit(Incidence $incidence)
    {
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
        return redirect()->route('incidences.index', $incidence)->with('success', 'La incidencia se actualizó con exito...');
    }

    public function destroy(Incidence $incidence)
    {
        $incidence->delete();

        return redirect()->route('incidences.index')->with('success', 'La incidencia se eliminó con exito...');
    }
}
