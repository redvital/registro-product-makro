<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:users.index')->only('index');
    //     $this->middleware('can:users.create')->only('create', 'store');
    //     $this->middleware('can:users.edit')->only('edit', 'update');
    //     $this->middleware('can:users.destroy')->only('destroy');
    //     $this->middleware('can:users.UpdateStatus')->only('UpdateStatus');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('estatus' == 1);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $roles = Role::all();
        
        $stores  = DB::table('stores')->pluck('name' , 'id');

        return view('users.create', compact('user','roles','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $user = User::create($request->all());
        if ($request->roles) {
            $user->roles()->sync($request->get('roles', 'user'));
        }
        return redirect()->route('users.index')->with('success', 'El usuario se registro con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $stores  = DB::table('stores')->pluck('name' , 'id');

        return view('users.edit', compact('roles', 'user','stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ( !empty($request->input('password')) ) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

        $user->save();

        return redirect()->route('users.index')->with('success', 'El usuario se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'El usuario se eliminó con éxito!');
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('users.show', compact('roles', 'user'));
    }

}
