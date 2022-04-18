<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowController;


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

Route::get('/welcome', function(){ return view('welcome'); });

Route::get('/', function () {
    return redirect('/top');
});

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// 認証が必要な処理群
Route::group(['middleware' => ['auth']], function(){
    Route::get('/top', [TweetController::class, 'timeline'])->name('top');

    Route::get('/config', [ConfigController::class, 'index'])->name('config');
    Route::post('/config/public/update', [ConfigController::class, 'public_update'])->name('config.public.update');
    Route::post('/config/name/update', [ConfigController::class, 'name_update'])->name('config.name.update');
    Route::post('/config/at_name/update', [ConfigController::class, 'at_name_update'])->name('config.at_name.update');

    Route::post('/tweet', [TweetController::class, 'tweet'])->name('tweet');
    Route::post('follow/subscribe', [FollowController::class, 'subscribe'])->name('follow.subscribe');
    Route::post('follow/unsubscribe', [FollowController::class, 'unsubscribe'])->name('follow.unsubscribe');
});


require __DIR__.'/auth.php';

Route::get('/{user:at_name?}', [TweetController::class, 'user_detail']);