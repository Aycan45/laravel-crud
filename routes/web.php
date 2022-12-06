<?php

use App\Http\Controllers\WebStreamController;
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

Route::get('/', [WebStreamController::class, 'index']);

Route::get('/create', [WebStreamController::class, 'create']);

Route::delete('/webstream/{id}', [WebStreamController::class, 'destroy']);

Route::get('webstreams-listing', [WebStreamController::class, 'index']);
