<!-- platilla para nuestra vista editar-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- formulario para editar con metodo de enctype-->
                    <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Titulo *</label>
                            <!--old, recordar dato a validar o so no hay imprimir lo que esta en la BD -->
                            <input type="text" name="title" class="form-control" required value="{{ old('title',$post->title) }}">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <label>Contenido *</label>
                            <!--old, recordar dato a validar o so no hay imprimir lo que esta en la BD -->
                            <textarea name="body" rows="6" class="form-control" required>{{ old('body',$post->body) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Contenido embebido *</label>
                            <!--old, recordar dato a validar o so no hay imprimir lo que esta en la BD -->
                            <textarea name="iframe"  class="form-control" >{{ old('iframe',$post->iframe) }}</textarea>
                        </div>
                        <div class="form-group">
                            <!-- comprobacion de token formilario seguro-->
                            @csrf
                            <!-- especifivar a laravel metodo a ocupar y router:list -->
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
