<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermonSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermon_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->dateTime('date_preached');
            $table->integer('preacher_id')->unsigned();
            $table->integer('summarizer_id')->unsigned();
            $table->integer('sermon_location_id')->unsigned();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('preacher_id')
                  ->references('id')->on('authors')
                  ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('summarizer_id')
                  ->references('id')->on('authors')
                  ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('sermon_location_id')
                  ->references('id')->on('universities')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sermon_summaries');
    }
}
