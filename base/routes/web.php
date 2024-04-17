<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;


Route::get('/', [AdminController::class, 'login']);
Route::get('/login', [AdminController::class, 'login']);
Route::post('/login', [AdminController::class, 'logins']);
Route::get('/forget_password', [AdminController::class, 'login']);
Route::get('/logout', function () {
    session()->forget(['isLoged']);
    return redirect("/admin");
});

Route::view('/test', 'admin.test');
Route::middleware(['isLogged'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::post('/posts', [BlogController::class, 'storePost']);
    Route::post('/posts/{postId}/comments', [BlogController::class, 'storeComment']);
    Route::get('/get-posts/{postId}', [BlogController::class, 'showPostWithComment']);


});
