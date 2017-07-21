<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Author;
use App\User;
use App\Role;
use App\SermonSummary;
use App\Asset;

/**
 * AJAX responses contain data directly in the response body. All errors are
 * signified by the response status code.
 */
class AjaxController extends Controller
{
    /**
     * Input:
     * - name
     * Output:
     * - List of stripped down Author objects that matches the name
     */
    public function getAuthorsByName(Request $request)
    {
        $name = $request->input('name', '');
        $matchedAuthors = Author::where('name', 'like', '%'.$name.'%')
                                ->cursor();
        $response = [];
        foreach ($matchedAuthors as $author)
        {
            $author = $author->makeHidden(['user_id', 'created_at', 'updated_at']);
            $response[] = $author->toArray();
        }
        return response()->json($response);
    }

    /**
     * Input:
     * - name
     * Output:
     * - List of stripped down User objects that matches the name
     */
    public function getUsersByName(Request $request)
    {
        $name = $request->input('name', '');
        $matchedUsers = User::where('name', 'like', '%'.$name.'%')
                            ->cursor();
        $response = [];
        foreach ($matchedUsers as $user)
        {
            $user = $user->makeHidden(['email', 'created_at', 'updated_at']);
            $response[] = $user->toArray();
        }
        return response()->json($response);
    }

    /**
     * Input:
     * - title
     * Output:
     * - List of stripped down Role objects that matches the title
     */
    public function getRolesByTitle(Request $request)
    {
        $title = $request->input('title', '');
        $matchedRoles = Role::where('title', 'like', '%'.$title.'%')
                            ->cursor();
        $response = [];
        foreach ($matchedRoles as $role)
        {
            $response[] = [
                'id' => $role->id,
                'name' => $role->title
            ];
        }
        return response()->json($response);
    }
}
