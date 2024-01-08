<?php

use App\Http\Controllers\BoatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('boats.index'));
});

Route::get('/home', function () {
    return redirect(route('boats.index'));
});

Route::resource('boats', BoatController::class);
Auth::routes();
