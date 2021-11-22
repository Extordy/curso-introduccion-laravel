<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //configurar dartos falsos para la BD
        'user_id' => 1,
        'title'   => $faker->sentence,
        'body'    => $faker->text(800),
    ];
});
