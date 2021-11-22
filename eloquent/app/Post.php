<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**relacion con user */
    public function user()
    {   /**un post pertenece a un usuario */
        return $this->belongsTo(User::class);
    }

     //metodo para dar estadares de formatos como lo muestra
    public function getGetTitleAttribute()
    {
         /**poner en mayusculas el titulo */
        return strtoupper($this->title);
    }

    //metodo para dar estadares de formatos de como guarda la informacion
    public function setTitleAttribute($value)
    {
        /**alterar el valor para que se guarde en minuscula  */
        $this->attributes['title']=strtolower($value);
    }
}

