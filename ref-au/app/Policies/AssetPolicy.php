<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Asset;

class AssetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }

    public function manage(User $user)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }

    public function update(User $user, Asset $asset)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }

    public function delete(User $user, Asset $asset)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }
}
