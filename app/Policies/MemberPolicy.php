<?php

namespace App\Policies;

use App\Member;
use App\Company;
use Illuminate\Foundation\Auth\User as User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class MemberPolicy
{
    use HandlesAuthorization;


    public function write_testimony2(User $user, Member $member)
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
