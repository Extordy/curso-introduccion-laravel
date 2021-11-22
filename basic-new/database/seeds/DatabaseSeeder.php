<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // crear datos de configuracion
        //creacion de usuario con eloquent y no con factory para saber la contraseña
        App\User::create([
            'name' => 'Yo',
            'email' => 'i@admin.com',
            'password' => bcrypt('123456')
        ]);

        //utizar el factory para la creacion de los post
        factory(App\Post::class, 24)->create();
    }
}
