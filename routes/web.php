<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicPieceController;

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

Route::redirect('/', 'flute')->name('home');
Route::get('{category}', [MusicPieceController::class, 'index'])->name('music');
