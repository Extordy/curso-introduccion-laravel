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
        // $this->call(UserSeeder::class);
        /**creacion de una forma que se creen cada ves que se actualize  */
        factory(App\User::class,4)->create();
        factory(App\Post::class,30)->create();
    }
}
