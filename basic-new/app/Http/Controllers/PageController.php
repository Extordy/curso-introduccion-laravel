<?php

namespace App\Http\Controllers;

//agregar archido entidad que me reprecenta la tabla
use App\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //metodo para imprimir todos los posts
    public function posts()
    {
        //configurar para que nod de una vista donde muestre los post.
        // lates -desendente, paginate-frmato de paginacion

        return view('posts',[
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    //metodo para imprimir un post, utilizando la valiable $post que se asigno en las rutas {post}
    public function post(Post $post)
    {
        //vista para mostrar un post
        return view('post',['post' => $post]);
    }
}
