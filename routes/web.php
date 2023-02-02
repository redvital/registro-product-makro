<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::resource('categories', [CategoryController::class])->names('categories');
Route::resource('categories', CategoryController::class )->except('show')->names('categories');
Route::resource('stores', StoreController::class )->except('show')->names('stores');
Route::resource('incidences', IncidenceController::class )->except('show')->names('incidences');
Route::resource('products', ProductController::class )->names('products');
Route::resource('users', UserController::class )->names('users');
