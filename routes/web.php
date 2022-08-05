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

Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Http\Livewire\Pages\Login::class)
        ->name('login');
});

Route::get('/', function () {
    return "Home";
})->name('home');

Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])
            ->name('admin.post.index');
        Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'edit'])
            ->name('admin.post.edit');
    });

