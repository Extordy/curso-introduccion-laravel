<?php

namespace App;
//utilizamos el slug para hacer mas amigable la URL que se muestra en el navegador
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    //decir que si resibe datos de forma masiba reciba esto
    protected $fillable = [
        'title', 'body', 'iframe', 'image', 'user_id'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    //metodo para hacer la relacion de un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //metodo para el estracto, en medio del get y Attribute va el nombre del atributo
    public function getGetExcerptAttribute()
    {
        return substr($this->body,0,140);
    }
}
