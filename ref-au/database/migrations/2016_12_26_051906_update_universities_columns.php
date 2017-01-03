<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUniversitiesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string('name')->after('subdomain');
            $table->integer('logo_id')->unsigned()->nullable()->default(null)->after('name');
            $table->integer('banners_asset_group_id')->unsigned()->nullable()->default(null)->after('logo_id');
            $table->integer('club_pictures_asset_group_id')->unsigned()->nullable()->default(null)->after('banners_asset_group_id');
            $table->string('meeting_place')->after('club_pictures_asset_group_id');
            $table->string('meeting_time')->after('meeting_place');
            $table->string('contact_person')->after('meeting_time');

            $table->foreign('logo_id')
                  ->references('id')->on('assets')
                  ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('banners_asset_group_id')
                  ->references('id')->on('asset_groups')
                  ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('club_pictures_asset_group_id')
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
        Schema::table('universities', function (Blueprint $table) {
            $table->dropForeign(['logo_id']);
            $table->dropForeign(['banners_asset_group_id']);
            $table->dropForeign(['club_pictures_asset_group_id']);

            $table->dropColumn('contact_person');
            $table->dropColumn('meeting_time');
            $table->dropColumn('meeting_place');
            $table->dropColumn('club_pictures_asset_group_id');
            $table->dropColumn('banners_asset_group_id');
            $table->dropColumn('logo_id');
            $table->dropColumn('name');
        });
    }
}
