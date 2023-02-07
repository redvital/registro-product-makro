<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LogSistema;
use Illuminate\Http\Request;

class LogsistemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:logs.index')->only('index');
    }
    
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name .'-'. auth()->user()->last_name . ' Ha ingresado a ver la lista de los movimientos: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('logs.index');
    }

}
