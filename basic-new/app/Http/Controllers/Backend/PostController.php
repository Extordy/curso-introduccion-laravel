<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
/** importar clase para trabajar la eliminacion de la imagen*/
use Illuminate\Support\Facades\Storage;
/**
 * remplazar request por defecto por el que creamos
*use Illuminate\Http\Request;
*/
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenet los posts de forma desendente
        $posts = Post::latest()->get();
        //retornar en una vista
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mostrar la vista
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //salvar
        $post = Post::create([
            //optener el id del usuario logiado en ese momento
            'user_id' => auth()->user()->id
            //y salvar todo el resto del formulario (envio masivo de datos)
            ]+ $request->all());

        //imagen
        //comprovar si se esta enviando imagen
        if($request->file('file')){
            // configuracion de la imagen y enviar el objeto completo po el store, es propio de laravel
            //y que se almacene en una carpeta llamada public
            //ya que en la BD se almacena la ruta no la imagen
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }

        //retornar
        return back()->with('status','Creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        /**retornar vista editar mas el envio de la variable post */
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //utilizar metodo de validacion PostRequest
    public function update(PostRequest $request, Post $post)
    {
        //optrener posts y actualizarlo
            //editamos
        $post->update($request->all());
        //comprovar si hay imagen a eliminar
        if($request->file('file')){
            // eliminar imagen
            Storage::disk('public')->delete($post->image);
            //actualizar archivo de imagen
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }

        return back()->with('status','Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // eliminar imagen
        Storage::disk('public')->delete($post->image);
        //optener post y eliminar
        $post->delete();
        //mensaje en status
        return back()->with('status','Eliminado con exito');
    }
}
