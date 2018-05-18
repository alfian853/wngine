<?php

namespace App\Policies;

use App\Member;
use App\Company;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as User

class JobPolicy
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

    public function view(User $user)
    {
        return TRUE;
    }

    public function edit(User $user, Job $job)
    {
        return $user instanceof Company && $user->c_id == $job->company_id;
    }

    public function delete(User $user, Job $job)
    {
        return $user instanceof Company && $user->c_id == $job->company_id;
    }

    public function create(User $user)
    {
        return $user instanceof Company;
    }

    public function take(User $user)
    {
        return $user instanceof Member;
    }
}
