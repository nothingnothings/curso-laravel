<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [JobController::class, 'index'])->name('home');

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('create-job');
Route::post('/jobs/create', [JobController::class, 'store'])->middleware('auth');


// * Both of these controllers are 'invokable controllers'.
Route::get('/search', SearchController::class)->name('search');
Route::get('/tags/{tag:name}', [TagController::class])->name('tag');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});
