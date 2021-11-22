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
/**se utilizara post */
use App\Post;

Route::get('eloquent', function () {
    /**metodo para acceder a todos los registos */
    // $posts = Post::all();
    $posts = Post::where('id','>=','20')
        ->orderBy('id','desc')
        /** obtener un numero predeterminado de registros*/
        //->take(3)
        ->get();
    foreach ($posts as $post){
        echo "$post->id $post->title <br>";
    }
});

Route::get('posts', function () {
    /**metodo para acceder a todos los registos */
    // $posts = Post::all();
    $posts = Post::get();
    foreach ($posts as $post){
        echo "
        $post->id
        <strong>{$post->user->get_name}</strong>
        $post->get_title <br>";
    }
});
/**invocamos entidad  a utilizar*/
use App\User;

Route::get('users', function () {
    /**metodo para acceder a todos los registos */
    // $posts = Post::all();
    $users= User::all();
    foreach ($users as $user){
        echo "
        $user->id
        <strong>$user->get_name</strong>
        {$user->posts->count()} posts <br>";
    }
});

//Usuo de colecciones
Route::get('collentions', function () {
    /**metodo para acceder a todos los registos */
    // $posts = Post::all();
    $users= User::all();
    /**metodo para obtener 5  */
    //dd($users->contains(5));
    /**metodo decir exepto  */
    //dd($users->except([1,2,3]));
    /**metodo para solo un elemento */
    //dd($users->only(4));
    /**metodo para buscar  */
    //dd($users->find(4));
    /**metodo cargar con relacion post  */
    dd($users->load('posts'));
});

//Usuo de serializacion
Route::get('serialization', function () {
    /**metodo para acceder a todos los registos */
    // $posts = Post::all();
    $users= User::all();
    //metodo para mostrar en array
    //dd($users->toArray());
    $user = $users->find(1);
    //dd($user);
    dd($user->toJson());
});
