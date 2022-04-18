<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfigController;
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
    // return view('welcome');
    return redirect('/top');
});

Route::get('/top', function () {
    return view('dashboard');
})->name('top');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/config', [ConfigController::class, 'index'])->name('config');
Route::post('/config/public/update', [ConfigController::class, 'public_update'])->name('config.public.update');

require __DIR__.'/auth.php';
