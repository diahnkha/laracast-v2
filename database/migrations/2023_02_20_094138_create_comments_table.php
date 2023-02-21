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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->contrained()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->text('body');

            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();

            // $table->id();
            // $table->unsignedBigInteger('post_id');
            // $table->unsignedBigInteger('user_id');
            // $table->timestamps();
            // $table->text('body');

            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
