<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**especificar relacion con post */
    public function posts()
    {
        /**un usuario tiene muchos post */
        return $this->hasMany(Post::class);
    }

    //metodo para dar estadares de formatos de como lo muestra
    public function getGetNameAttribute()
    {
        /**poner en mayusculas el nombre */
        return strtoupper($this->name);
    }

    //metodo para dar estadares de formatos de como guarda la informacion
    public function setNameAttribute($value)
    {
        /**alterar el valor para que se guarde en minuscula  */
        $this->attributes['name']=strtolower($value);
    }
}
