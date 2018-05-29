<?php

namespace App\Policies;

use App\Member;
use App\Company;
use Illuminate\Foundation\Auth\User as User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

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
    public function write_testimony(User $user, Company $company)
    {
        $job_done_at_company = DB::table('jobs_taken')
            ->join('jobs', 'jobs.id', '=', 'jobs_taken.job_id')
            ->where('jobs_taken.worker_email', '=', $user->email)
            ->where('jobs_taken.status', '=', '4')
            ->where('jobs.company_id', '=', $company->c_id)
            ->get();

        return $user instanceof Member && count($job_done_at_company);
    }

    /**
     * Determine whether the user (company) can write a testimony
     * for a certain member.
     *
     * @param  \Illuminate\Foundation\Auth\User  $user
     * @return boolean
     */
    public function write_testimony_to_member(User $user, Member $member)
    {
        $job_done_at_company = DB::table('jobs_taken')
            ->join('jobs', 'jobs.id', '=', 'jobs_taken.job_id')
            ->where('jobs_taken.worker_email', '=', $member->email)
            ->where('jobs_taken.status', '=', '4')
            ->where('jobs.company_id', '=', $user->c_id)
            ->get();

        return $user instanceof Company && count($job_done_at_company);
    }
}
