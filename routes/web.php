<?php

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

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ArkibController;

Route::get('/', function () {
    return view('prototype.dashboard');
});

Route::resource('catalog', CatalogController::class);

Route::resource('arkib', ArkibController::class);
