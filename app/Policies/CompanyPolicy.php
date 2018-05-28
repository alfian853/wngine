<?php

namespace App\Policies;

use App\Member;
use App\Company;
use Illuminate\Foundation\Auth\User as User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user (member) can write a testimony
     * for a certain company.
     *
     * @param  \Illuminate\Foundation\Auth\User  $user
     * @return boolean
     */
    public function write_testimony(User $user)
    {
        return $user instanceof Member;
    }
}
