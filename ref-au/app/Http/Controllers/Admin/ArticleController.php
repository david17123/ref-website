<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\Article;
use App\Asset;
use App\AssetGroup;
use App\Author;

class ArticleController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    /**
     * Sets the asset group's assets to be the one listed in the $newAssets
     * specified.
     *
     * @param AssetGroup $assetGroup
     * @param Collection $newAssets
     * @param bool $remove $asset->remove() will only be called if this is true.
     * Defaults to false.
     * @return Array(Asset) List of assets to be removed from the group
     */
    private function _updateAssetGroup(AssetGroup $assetGroup, Collection $newAssets, $remove=false)
    {
        $oldAssets = $assetGroup->assets;
        $oldAssetsHash = [];
        foreach ($oldAssets as $oldAsset)
        {
            $oldAssetsHash[$oldAsset->id] = $oldAsset;
        }

        if (count($newAssets) > 0)
        {
            // Save new assets
            foreach ($newAssets as $newAsset)
            {
                if ( isset($oldAssetsHash[$newAsset->id]) )
                {
                    // Asset is associated properly. Do not delete.
                    unset($oldAssetsHash[$newAsset->id]);
                }
                else
                {
                    $newAsset->asset_group_id = $assetGroup->id;
                    $newAsset->save();
                }
            }
        }

        $assetsToRemove = [];
        foreach ($oldAssetsHash as $assetId => $oldAsset)
        {
            $assetsToRemove[] = $oldAsset;
            if ($remove)
            {
                $oldAsset->remove();
                $oldAsset->save();
            }
        }

        return $assetsToRemove;
    }

    public function manageArticles()
    {
        $this->sitePage->setPageClass('admin-manage-articles');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles']
        ]);

        $articles = Article::all();

        $viewVars = [
            'articles' => $articles
        ];
        return view('page/admin/manageArticles', $viewVars);
    }

    public function createArticle()
    {
        $this->sitePage->setPageClass('admin-edit-article');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles', 'link' => route('manageArticles')],
            ['text' => 'New article']
        ]);

        $viewVars = [
            'preachersAjaxUrl' => route('getAuthorsAjax')
        ];
        return view('page/admin/editArticle', $viewVars);
    }

    public function editArticle(Article $article)
    {
        $this->sitePage->setPageClass('admin-edit-article');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles', 'link' => route('manageArticles')],
            ['text' => $article->title]
        ]);

        $viewVars = [
            'article' => $article,
            'preachersAjaxUrl' => route('getAuthorsAjax')
        ];
        return view('page/admin/editArticle', $viewVars);
    }

    public function saveArticle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'content' => 'required|string',
            'author' => 'required|numeric',
            'heroImage' => 'required|array',
            'articleId' => 'numeric'
        ]);

        // Fetch sermon summary object
        $articleId = $request->input('articleId', '');
        if ($articleId === '')
        {
            $article = new Article();
        }
        else
        {
            $article = Article::find($articleId);
            if ( !$article )
            {
                abort(404, 'Article not found');
            }
        }

        // Fetch preacher and summarizer objects
        $authorId = $request->input('author');
        $author = Author::find($authorId);
        if ( !$author )
        {
            abort(404, 'Author not found');
        }

        // Process hero image
        $heroImageId = count($request->input('heroImage')) > 0 ? $request->input('heroImage') : null;
        $heroImage = Asset::find($heroImageId)->first();
        if ($heroImage)
        {
            $heroImage->finalize();
        }

        $article->title = $request->input('title');
        $article->subtitle = $request->input('subtitle');
        $article->content = $request->input('content');
        $article->author()->associate($author);
        if ($heroImage)
        {
            if ($article->heroImage && $article->heroImage->id != $heroImage->id)
            {
                // Remove the old hero image
                $article->heroImage->remove();
            }
            $article->heroImage()->associate($heroImage);
        }

        $article->save();

        return redirect()->route('editArticle', ['article' => $article->id]);
    }

    public function deleteArticle(Article $article)
    {
        if ($article->heroImage)
        {
            $heroImage = $article->heroImage;
            $article->heroImage()->dissociate();
            $heroImage->remove();
        }
        $article->delete();
        return redirect()->route('manageArticles');
    }
}
