<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('post',[PostController::class,'index'])->name('post.index');
Route::get('post/{id}/show',[PostController::class,'show'])->name('post.show');
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::post('post',[PostController::class,'store'])->name('post.store');
Route::get('post/{id}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('post/{id}',[PostController::class,'update'])->name('post.update');
Route::delete('post/{id}/delete',[PostController::class,'destroy'])->name('post.destroy');
Route::get('post/{id}/author',[PostController::class,'authorposts'])->name('post.author');
