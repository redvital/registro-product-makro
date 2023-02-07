<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LogSistema;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create','store');
        $this->middleware('can:categories.edit')->only('edit','update');
        $this->middleware('can:categories.destroy')->only('destroy');

    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de categorias: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $categories = Category::all();

        return view ('categories.index', compact('categories'));
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para registrar una nueva categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('categories.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'description' => 'required'
        ]);

        Category::create($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha  registrado una nueva categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('categories.index')->with('success', 'La categoria se creo con exito...');
    }

    public function edit(Category $category)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para editar una categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view ('categories.edit', compact('category'));
        
    }

    public function update(Request $request,Category  $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
            'description' => 'required'

        ]);

        $category->update($request->all());

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha actualizado una categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('categories.index', $category)->with('success', 'La categoria se actualizó con exito...');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha eliminado una categoria: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('categories.index')->with('success', 'La categoria se eliminó con exito...');
    }
}
