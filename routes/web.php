<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
Route::get('/contact', [\App\Http\Controllers\PostController::class, 'contact'])->name('contact');
Route::post('/contact/send', [\App\Http\Controllers\PostController::class, 'contactMessage'])->name('contact-mail');

Route::get('/blogs', [\App\Http\Controllers\PostController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [\App\Http\Controllers\PostController::class, 'blog'])->name('blog');

Route::get('/lout', function (){
    Auth::logout();
    return redirect()->route('index');
})->name('l-out');

Auth::routes(['register' => true]);
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){
    Route::get('/panel', [\App\Http\Controllers\AdminController::class, 'index'])->name('a-index');
    Route::get('/panel/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('a-create');
    Route::post('/panel/create/store', [\App\Http\Controllers\AdminController::class, 'store'])->name('a-store');
    Route::delete('/panel/delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('a-destroy');
    Route::get('/panel/edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit'])->name('a-edit');
    Route::patch('/panel/update/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('a-update');
    Route::get('/panel/posts', [\App\Http\Controllers\AdminController::class, 'posts'])->name('a-posts');
});

Route::middleware(['auth', 'admin-check'])->group(function (){
    Route::get('/super/panel', [\App\Http\Controllers\SuperAdminController::class, 'index'])->name('s-index');
    Route::get('/super/panel/create', [\App\Http\Controllers\SuperAdminController::class, 'create'])->name('s-create');
    Route::post('/super/panel/create/store', [\App\Http\Controllers\SuperAdminController::class, 'store'])->name('s-store');
    Route::delete('/super/panel/delete/{id}', [\App\Http\Controllers\SuperAdminController::class, 'destroy'])->name('s-destroy');
    Route::get('/super/panel/edit/{id}', [\App\Http\Controllers\SuperAdminController::class, 'edit'])->name('s-edit');
    Route::patch('/super/panel/update/{id}', [\App\Http\Controllers\SuperAdminController::class, 'update'])->name('s-update');
    Route::get('/super/panel/posts', [\App\Http\Controllers\SuperAdminController::class, 'posts'])->name('s-posts');
    Route::get('/super/panel/users', [\App\Http\Controllers\SuperAdminController::class, 'users'])->name('s-users');
    Route::get('/super/panel/users/{id}/posts', [\App\Http\Controllers\SuperAdminController::class, 'usersPosts'])->name('s-users-posts');
});
