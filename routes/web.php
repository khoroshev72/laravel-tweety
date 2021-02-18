<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use \App\Http\Controllers\ExpolreController;
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
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])
        ->name('home');
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::get('/profile/{user:slug}', [ProfileController::class, 'show'])
        ->name('profile');
    Route::post('/profile/{user:slug}/follow', [FollowController::class, 'store'])
        ->name('follow.store');
    Route::delete('/profile/{user:slug}/unfollow', [FollowController::class, 'delete'])
        ->name('follow.delete');
    Route::get('/profile/{user:slug}/edit', [ProfileController::class, 'edit'])
      ->name('profile.edit')
      ->middleware('can:edit,user');
    Route::patch('/profile/{user:slug}/update', [ProfileController::class, 'update'])
      ->name('profile.update')
      ->middleware('can:edit,user');
    Route::get('/explore', [ExpolreController::class, 'index'])
      ->name('explore');
});

require __DIR__.'/auth.php';
