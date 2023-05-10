<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
             $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('microposts_id');
            $table->timestamps();
            
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('microposts_id')->references('id')->on('users')->onDelete('cascade');
             
             // user_idとfollow_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'microposts_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite');
    }
};
