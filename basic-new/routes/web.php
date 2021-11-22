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

Route::get('/','PageController@posts');
//cuando le de clic a algun post
Route::get('blog/{post}','PageController@post')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta tipo resource que esta dentro de bakend
//con proteccion de autentificacion mediante middleware y exceptuando el metodo show
Route::resource('posts', 'Backend\PostController' )
    ->middleware('auth')
    ->except('show');
