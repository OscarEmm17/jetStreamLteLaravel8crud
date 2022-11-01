<?php
use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\ProductoZeusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistroUserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

Route::resource('producto_zeus', ProductoZeusController::class);

Route::resource('productoweb', ProductWebController::class);

Route::resource('category', CategoryController::class);

Route::resource('registro', RegistroUserController::class);


