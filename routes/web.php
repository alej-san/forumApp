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
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


Route::get('/', [ForumController::class, 'index'])->name('index');
Route::get('poster/login', [ForumController::class, 'login'])->name('login');
Route::get('poster/logout', [ForumController::class, 'logout'])->name('logout');


Route::resource('topic', TopicController::class);
Route::resource('poster', PosterController::class);
Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);

