<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Gate;

use App\HelperClasses\SitePageService;

use App\User;
use App\Role;

class UserController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function manageUsers()
    {
        $this->authorize('manage', User::class);

        $this->sitePage->setPageClass('admin-manage-users');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage users']
        ]);

        $users = User::all();

        $viewVars = [
            'users' => $users
        ];
        return view('page/admin/manageUsers', $viewVars);
    }

    public function createUser()
    {
        $this->authorize('create', User::class);

        $this->sitePage->setPageClass('admin-edit-user');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage users', 'link' => route('manageUsers')],
            ['text' => 'New user']
        ]);

        $viewVars = [
            'rolesAjaxUrl' => route('getRolesAjax')
        ];

        return view('page/admin/editUser', $viewVars);
    }

    public function editUser(User $user)
    {
        $this->authorize('update', $user);

        $this->sitePage->setPageClass('admin-edit-user');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage users', 'link' => route('manageUsers')],
            ['text' => $user->name]
        ]);

        $viewVars = [
            'user' => $user,
            'rolesAjaxUrl' => route('getRolesAjax')
        ];
        return view('page/admin/editUser', $viewVars);
    }

    public function saveUser(Request $request)
    {
        // TODO @David How to deal with password and remember_token fields when creating new user?
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'roleId' => 'numeric',
            'userId' => 'numeric'
        ]);

        // Fetch user object
        $userId = $request->input('userId', '');
        if ($userId === '')
        {
            $userToSave = new User();
        }
        else
        {
            $userToSave = User::find($userId);
            if ( !$userToSave )
            {
                abort(404, 'User not found');
            }
        }

        $this->authorize('update', $userToSave);

        // Fetch role object
        $role = null;
        $roleId = $request->input('roleId', '');
        if ($roleId !== '')
        {
            $this->authorize('updateRole', $userToSave);

            $role = Role::find($roleId);
            if ( !$role )
            {
                abort(404, 'Role not found');
            }
        }

        $userToSave->name = $request->input('name');
        $userToSave->email = $request->input('email');
        if (Gate::allows('updateRole', $userToSave))
        {
            if ($role)
            {
                $userToSave->role()->associate($role);
            }
            else
            {
                if ($userToSave->role)
                {
                    $userToSave->role()->dissociate();
                }
            }
        }

        $userToSave->save();

        return redirect()->route('editUser', ['user' => $userToSave->id]);
    }

    public function deleteUser(User $userToDelete)
    {
        $this->authorize('delete', $userToDelete);

        $userToDelete->delete();
        return redirect()->route('manageUsers');
    }
}
