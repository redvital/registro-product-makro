<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackupsController extends Controller
{
    //
    public function index()
    {
        return view('backup.index');
    }
}
