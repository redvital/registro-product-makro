<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BackupsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogsistemaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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
    return view('auth/login');
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

Route::group(['middleware' => 'auth'], function () {

    // Route::resource('categories', [CategoryController::class])->names('categories');
    Route::resource('categories', CategoryController::class)->except('show')->names('categories');
    Route::resource('departaments', DepartamentController::class)->except('show')->names('departaments');
    Route::resource('stores', StoreController::class)->except('show')->names('stores');
    Route::resource('incidences', IncidenceController::class)->except('show')->names('incidences');
    Route::resource('status', StatuController::class)->names('status');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('authorizations', AuthorizationController::class)->names('authorizations');

    Route::get('stores/incidence-store/{store}', [StoreController::class, 'incidencestore'])->name('stores.incidence-store');
    Route::resource('logins', LoginController::class)->names('logins');
    Route::resource('logs', LogsistemaController::class)->names('logs');
    Route::resource('backups', BackupsController::class)->names('backups');
});
