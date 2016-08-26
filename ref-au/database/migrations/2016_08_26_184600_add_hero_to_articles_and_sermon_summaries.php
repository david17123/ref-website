<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHeroToArticlesAndSermonSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('hero_image_id')->unsigned()->nullable()->after('content');
            $table->foreign('hero_image_id')
                  ->references('id')->on('assets')
                  ->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('sermon_summaries', function (Blueprint $table) {
            $table->integer('hero_image_id')->unsigned()->nullable()->after('content');
            $table->foreign('hero_image_id')
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['hero_image_id']);
            $table->dropColumn('hero_image_id');
        });
        Schema::table('sermon_summaries', function (Blueprint $table) {
            $table->dropForeign(['hero_image_id']);
            $table->dropColumn('hero_image_id');
        });
    }
}
