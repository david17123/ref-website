<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssetGroupToAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->integer('asset_group_id')->unsigned()->nullable()->default(null)->after('id');
            $table->foreign('asset_group_id')
                  ->references('id')->on('asset_groups')
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
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['asset_group_id']);
            $table->dropColumn('asset_group_id');
        });
    }
}
