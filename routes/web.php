<?php

use App\Http\Controllers\DogController;
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

Route::get("/", [DogController::class, 'index']);

Route::resource('dogs', DogController::class)->only(['index', 'create', 'store']);
