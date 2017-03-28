<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\University;

class PublishedFlagForUni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->boolean('published')->after('name')->default(false);
        });

        // Default value for column is false, but set all existing uni to true
        $universities = University::all();
        foreach ($universities as $uni)
        {
            $uni->published = true;
            $uni->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }
}
