<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statu;

class StatuController extends Controller
{
   

    public function index()
    {
        $Status = Statu::all();

        return view ('Status.index', compact('Status'));
    }

    public function create()
    {
        return view ('Status.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'slug' => 'required|unique:Status',
            'type' => 'required'
        ]);

        Statu::create($request->all());

        return redirect()->route('Status.index')->with('success', 'status se creo con exito...');
    }

    public function edit(Statu $Statu)
    {
        return view ('Status.edit', compact('Statu'));
        
    }

    public function update(Request $request,Statu  $Statu)
    {
        $request->validate([
            'description' => 'required',
            'slug' => "required|unique:Status,slug,$Statu->id",
            'type' => 'required'
        ]);

        $Statu->update($request->all());
        return redirect()->route('Status.index', $Statu)->with('success', 'status se actualizó con exito...');
    }

    public function destroy(Statu $Statu)
    {
        $Statu->delete();

        return redirect()->route('Status.index')->with('success', 'status se eliminó con exito...');
    }
}
