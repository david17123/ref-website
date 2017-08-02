<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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

    /**
     * Input:
     * - email
     * Output:
     * - Subscribed true or false
     */
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string'
        ]);

        $email = $request->input('email', '');

        Mail::raw("New subscriber: $email", function ($message) {
            $message->from('info@ref-au.org', 'REF Site');
            $message->to('reformedevangelicalclub@gmail.com');
            $message->subject('[New Subscription] Subscribed via REF main site');
        });

        return response()->json(array('subscribed' => true));
    }

    /**
     * Input:
     * - name
     * - email
     * - subject
     * - message
     * Output:
     * - Success true or false
     */
    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $name = $request->input('name', '');
        $email = $request->input('email', '');
        $subject = $request->input('subject', '');
        $messageContent = $request->input('message', '');

        $view = ['text' => 'emails.text.contactUs'];
        $viewVars = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'messageContent' => $messageContent
        ];
        Mail::send($view, $viewVars, function ($message) use ($subject) {
            $emailSubject = '[Contact Us] ' . substr($subject, 0, 100) . (strlen($subject) > 100 ? '...' : '');
            $message->from('info@ref-au.org', 'REF Site');
            $message->to('david.andika17123@gmail.com');
            $message->subject($emailSubject);
        });

        return response()->json(array('success' => true));
    }
}
