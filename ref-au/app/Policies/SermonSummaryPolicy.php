<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\SermonSummary;

class SermonSummaryPolicy
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

    public function update(User $user, SermonSummary $sermonSummary)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }

    public function delete(User $user, SermonSummary $sermonSummary)
    {
        return $user->role && $user->role->code_name === 'siteAdmin';
    }
}
