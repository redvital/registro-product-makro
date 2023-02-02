<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Authorization;
use Illuminate\Support\Facades\DB;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:authorizations.index')->only('index');
        $this->middleware('can:authorizations.create')->only('create','store');
        $this->middleware('can:authorizations.edit')->only('edit','update');
        $this->middleware('can:authorizations.destroy')->only('destroy');

    }

    public function index()
    {
        $authorizations = Authorization::all();

        return view ('authorizations.index', compact('authorizations'));
    }

    public function create()
    {
        $stores  = DB::table('stores')->pluck('name' , 'id');
        $users  = DB::table('users')->pluck('name' , 'id');

        return view ('authorizations.create', compact('users','stores'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:authorizations',
            'description' => 'required'
        ]);

        Authorization::create($request->all());

        return redirect()->route('authorizations.index')->with('success', 'La autorización se creo con exito...');
    }

    public function edit(Authorization $category)
    {
        return view ('authorizations.edit', compact('category'));
        
    }

    public function update(Request $request,Authorization  $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:authorizations,slug,$category->id",
            'description' => 'required'

        ]);

        $category->update($request->all());
        return redirect()->route('authorizations.index', $category)->with('success', 'La autorización se actualizó con exito...');
    }

    public function destroy(Authorization $category)
    {
        $category->delete();

        return redirect()->route('authorizations.index')->with('success', 'La autorización se eliminó con exito...');
    }
}
