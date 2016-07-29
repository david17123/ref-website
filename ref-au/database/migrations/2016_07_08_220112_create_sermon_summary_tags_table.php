<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermonSummaryTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermon_summary_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sermon_summary_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('sermon_summary_id')
                  ->references('id')->on('sermon_summaries')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tag_id')
                  ->references('id')->on('tags')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sermon_summary_tags');
    }
}
