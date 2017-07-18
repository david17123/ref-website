<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicquotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picquotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('image_id')->unsigned()->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('image_id')
                  ->references('id')->on('assets')
                  ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('picquotes');
    }
}
