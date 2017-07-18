<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\SermonSummary;

class PublishedFlagForSermonSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermon_summaries', function (Blueprint $table) {
            $table->boolean('published')->after('sermon_location_id')->default(false);
        });

        // Default value for column is false, but set all existing sermon summaries to true
        $sermonSummaries = SermonSummary::all();
        foreach ($sermonSummaries as $sermonSummary)
        {
            $sermonSummary->published = true;
            $sermonSummary->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sermon_summaries', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }
}
