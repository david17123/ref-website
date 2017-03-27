<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('cloud_filename');
            $table->bigInteger('size');
            $table->integer('asset_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('asset_id')
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
        Schema::drop('asset_files');
    }
}
