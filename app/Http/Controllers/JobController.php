<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;
use App\Company;
use App\Skill;

class JobController extends Controller
{
    public function homeQuery(Request $request){
      return redirect('google.com');
    }

    public function searchQuery(Request $request){
      return "ntaps";
    }

    public function showJobSearch(){
      return view('job.job_search');
    }

	public function showDescriptionJob($id)
	{
		$job = Job::where('id', $id)->first();

		//dd($job);

		$data = array();

		$data['job_name'] = $job->name;
		$data['start_date'] = $job->upload_date;
		$data['due_date'] = $job->finish_date;
		$data['company_name'] = Company::select('c_name')
									->where('c_id', $job->company_id)
									->first()
									->c_name;
		$data['description'] = $job->description;
		$data['document_url'] = $job->document;
		$data['skills'] = array();

		$job_skill = DB::table('job_skills')
						->where('job_id', $job->id)
						->get();
		foreach($job_skill as $v)
		{
			$skill = Skill::select('name')->where('id', $v->skill_id)->first()->name;
			$data['skills'][$skill] = $v->point;
		}

		//dd($data);

		return view('job.job_description', ['data' => $data]);
	}
}
