<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;
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

Route::get('/', function () { return view('welcome');});
Route::get('/modal', [ModalController::class, 'showModal'])->name('modal');

Route::get('/registro', [ModalController::class, 'registroModal'])->name('registro');



