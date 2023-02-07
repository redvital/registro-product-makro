<?php

namespace App\Http\Controllers;

use App\Models\LogSistema;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:logins.index')->only('index');
    }
    
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de sesiones: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('logins.index');
    }
}
