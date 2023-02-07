<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\LogSistema;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de usuarios: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('users.index');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado al formulario para asignar un rol: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha asignado un rol a un usuario: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('users.edit', $user)->with('info', 'Se asigno el rol Correctamente');
    }

}
