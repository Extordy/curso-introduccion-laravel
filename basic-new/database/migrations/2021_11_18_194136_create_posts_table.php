<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //campo para la relacion
            $table->bigInteger('user_id')->unsigned();

            //crear los campos de nuestras tablas y de que tipo serian
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('image')->nullable();

            $table->text('body');

            //campo para datos embebidos y permita campos nulos
            $table->text('iframe')->nullable();

            $table->timestamps();

            //hacer la relacio de tablas por id
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
