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
        $response = $this->json('POST','/api/posts',[
            'title' => 'El post de prueba'
        ]);

        /**Revisar estructura */
        $response->assertJsonStructure(['id','title','created_at','updated_at'])
        /**si solo llega elñ json */
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201);//Estatus http

        $this->assertDatabaseHas('posts',['title' => 'El post de prueba']);
    }
}
