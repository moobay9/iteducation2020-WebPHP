<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\TweetController;
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

Route::get('/{user:name?}', [TweetController::class, 'user_detail']);


// 認証が必要な処理群
Route::group(['middleware' => ['auth']], function(){

    Route::get('/config', [ConfigController::class, 'index'])->name('config');
    Route::post('/config/public/update', [ConfigController::class, 'public_update'])->name('config.public.update');

    Route::post('/tweet', [TweetController::class, 'tweet'])->name('tweet');
});

require __DIR__.'/auth.php';
