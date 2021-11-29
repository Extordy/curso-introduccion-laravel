<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    //agregar para trabajar con base de datos
    use RefreshDatabase;
    /**crear test pueba para optener el primer paso de rojo */
    public function test_store()
    {
        //metodo manejador de errores
        //$this->withoutExceptionHandling();
        $response = $this->json('POST','/api/posts',[
            'title' => 'El post de prueba'
        ]);

        /**Revisar estructura */
        $response->assertJsonStructure(['id','title','created_at','updated_at'])
        /**si solo llega el json */
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201);//Estatus http
        //que ne la base de datos existe el post de prueba
        $this->assertDatabaseHas('posts',['title' => 'El post de prueba']);
    }
    public function test_validate_title()
    {
        $response = $this->json('POST','/api/posts',[
            'title' => ''
        ]);
        //Estarus HTT 422
        $response->assertStatus(422)
            ->assertJsonValidationErrors('title');
    }
}
