<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\Author;
use App\User;

class AuthorController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function manageAuthors()
    {
        $this->sitePage->setPageClass('admin-manage-authors');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage authors']
        ]);

        $authors = Author::all();

        $viewVars = [
            'authors' => $authors
        ];
        return view('page/admin/manageAuthors', $viewVars);
    }

    public function createAuthor()
    {
        $this->sitePage->setPageClass('admin-edit-author');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage authors', 'link' => route('manageAuthors')],
            ['text' => 'New author']
        ]);

        $viewVars = [
            'usersAjaxUrl' => route('getUsersAjax')
        ];

        return view('page/admin/editAuthor', $viewVars);
    }

    public function editAuthor(Author $author)
    {
        $this->sitePage->setPageClass('admin-edit-author');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage authors', 'link' => route('manageAuthors')],
            ['text' => $author->name]
        ]);

        $viewVars = [
            'author' => $author,
            'usersAjaxUrl' => route('getUsersAjax')
        ];
        return view('page/admin/editAuthor', $viewVars);
    }

    public function saveAuthor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'userId' => 'numeric',
            'authorId' => 'numeric'
        ]);

        // Fetch author object
        $authorId = $request->input('authorId', '');
        if ($authorId === '')
        {
            $author = new Author();
        }
        else
        {
            $author = Author::find($authorId);
            if ( !$author )
            {
                abort(404, 'Author not found');
            }
        }

        // Fetch user object
        $user = null;
        $userId = $request->input('userId', '');
        if ($userId !== '')
        {
            $user = User::find($userId);
            if ( !$user )
            {
                abort(404, 'User not found');
            }
        }

        $author->name = $request->input('name');
        if ($user)
        {
            $author->user()->associate($user);
        }
        else
        {
            if ($author->user)
            {
                $author->user()->dissociate();
            }
        }

        $author->save();

        return redirect()->route('editAuthor', ['author' => $author->id]);
    }

    public function deleteAuthor(Author $author)
    {
        $author->delete();
        return redirect()->route('manageAuthors');
    }
}
