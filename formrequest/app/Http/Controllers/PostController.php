<?php

namespace App\Http\Controllers;

/**cambiar el request por ql que creamos para validar  */
/** use Illuminate\Http\Request; */
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        dd($request->all());
    }
}
