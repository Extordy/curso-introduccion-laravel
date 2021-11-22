<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**creacion de cocnructor para proteger controlador con middleware
     * lo recomdedable es que se haga desde las rutas esta autentificacion
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
