<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
Route::get('/about', [\App\Http\Controllers\PostController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\PostController::class, 'contact'])->name('contact');
Route::post('/contact/send', [\App\Http\Controllers\PostController::class, 'contactMessage'])->name('contact-mail');

Route::get('/post', [\App\Http\Controllers\PostController::class, 'post'])->name('post');

Route::get('/blogs', [\App\Http\Controllers\PostController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [\App\Http\Controllers\PostController::class, 'blog'])->name('blog');


Auth::routes(['register' => true]);
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin-check'])->group(function (){
    Route::get('/panel', [\App\Http\Controllers\AdminController::class, 'index'])->name('a-index');
    Route::get('/panel/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('a-create');
    Route::post('/panel/create/store', [\App\Http\Controllers\AdminController::class, 'store'])->name('a-store');
    Route::delete('/panel/delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('a-destroy');
    Route::get('/panel/edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit'])->name('a-edit');
    Route::patch('/panel/update/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('a-update');
    Route::get('/panel/posts', [\App\Http\Controllers\AdminController::class, 'posts'])->name('a-posts');
});
