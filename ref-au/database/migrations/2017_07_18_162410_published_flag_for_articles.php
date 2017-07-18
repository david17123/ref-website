<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Article;

class PublishedFlagForArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('published')->after('author_id')->default(false);
        });

        // Default value for column is false, but set all existing articles to true
        $articles = Article::all();
        foreach ($articles as $article)
        {
            $article->published = true;
            $article->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }
}
