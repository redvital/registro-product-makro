<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        return view ('status.index');
    }

    public function create()
    {
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

        return redirect()->route('status.index')->with('success', 'El Estatus se creo con exito...');
    }

    public function edit(Statu $status)
    {
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
        return redirect()->route('status.index', $status)->with('success', 'El Estatus se actualizó con exito...');
    }

    public function destroy(Statu $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', 'El Estatus se eliminó con exito...');
    }
}
