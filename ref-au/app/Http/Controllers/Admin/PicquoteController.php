<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\Picquote;
use App\Asset;
use App\AssetGroup;

class PicquoteController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function managePicquotes()
    {
        $this->authorize('manage', Picquote::class);

        $this->sitePage->setPageClass('admin-manage-picquotes');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage picquotes']
        ]);

        $picquotes = Picquote::all();

        $viewVars = [
            'picquotes' => $picquotes
        ];
        return view('page/admin/managePicquotes', $viewVars);
    }

    public function createPicquote()
    {
        $this->authorize('create', Picquote::class);

        $this->sitePage->setPageClass('admin-edit-picquote');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage picquotes', 'link' => route('managePicquotes')],
            ['text' => 'New picquote']
        ]);

        return view('page/admin/editPicquote');
    }

    public function editPicquote(Picquote $picquote)
    {
        $this->authorize('update', $picquote);

        $this->sitePage->setPageClass('admin-edit-picquote');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage picquotes', 'link' => route('managePicquotes')],
            ['text' => $picquote->title]
        ]);

        $viewVars = [
            'picquote' => $picquote
        ];
        return view('page/admin/editPicquote', $viewVars);
    }

    public function savePicquote(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'image' => 'required|array',
            'picquoteId' => 'numeric'
        ]);

        // Fetch picquote object
        $picquoteId = $request->input('picquoteId', '');
        if ($picquoteId === '')
        {
            $picquote = new Picquote();
        }
        else
        {
            $picquote = Picquote::find($picquoteId);
            if ( !$picquote )
            {
                abort(404, 'Picquote not found');
            }
        }

        $this->authorize('update', $picquote);

        // Process image
        $imageId = count($request->input('image')) > 0 ? $request->input('image') : null;
        $image = Asset::find($imageId)->first();
        if ($image)
        {
            $image->finalize();
        }

        $picquote->title = $request->input('title');
        $picquote->published = $request->input('published') === '1';
        if ($image)
        {
            if ($picquote->image && $picquote->image->id != $image->id)
            {
                // Remove the old hero image
                $picquote->image->remove();
            }
            $picquote->image()->associate($image);
        }

        $picquote->save();

        return redirect()->route('editPicquote', ['picquote' => $picquote->id]);
    }

    public function deletePicquote(Picquote $picquote)
    {
        $this->authorize('delete', $picquote);

        if ($picquote->image)
        {
            $image = $picquote->image;
            $picquote->image()->dissociate();
            $image->remove();
        }
        $picquote->delete();
        return redirect()->route('managePicquotes');
    }
}
