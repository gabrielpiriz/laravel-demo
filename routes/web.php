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

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/post/{id}', 'PostsController@show')->name('posts.show'); //muestra el detalle de un post

Auth::routes();

Route::resource('posts.comments', CommentsController::class); //el orden importa

Route::resource('posts', 'PostsController');