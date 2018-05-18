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

    }

    public function showPostingJobForm(){
        $skill = Skill::all();

        $skill_list = array();
        foreach($skill as $s)
            $skill_list[$s->id] = $s->name;

        return view('company.postingJob', ['skill' => $skill_list]);
    }

    public function postingJob(Request $request){
    $xx = Validator::make($request->all(),[
      'name' => 'required|min:6',
      'finishDate' => 'required|date_format:Y-m-d|after:'.date("Y-m-d"),
      'job_list' => 'required|min:3',
      'shortDescription' => 'required',
      'documentnya' => 'mimes:pdf'
    ],
    [
      'job_list.required' => 'you must pay :(',
      'finishDate.after' => 'the deadline must be atleast tomorrow',
      'job_list.min' => 'you must put atleast one skill point reward'
    ]
    )->validate($request->all());

    $targetPath = null;
    if($request->has('documentnya')){
      $path = Storage::putFile('public', $request->file('documentnya'));
      $targetPath = date('Y-m-d-H-m-s').'-'.$request->file('documentnya')->getClientOriginalName();
      Storage::move($path,'job_documents/'.$targetPath);
    }
    // dd($targetPath)
        $company_id = Auth::guard('company')->user()->c_id;
    // dd($targetPath);
        $job = Job::create([
            'name'				=> $request->name,
            'description'		=> $request->shortDescription,
            'upload_date'		=> date('Y-m-d'),
            'finish_date'		=> $request->finishDate,
            'document'			=> $targetPath,
            'company_id'		=> $company_id,
        ]);


        $skill_list = json_decode($request->job_list, true);
        foreach($skill_list as $s_id => $point)
        {
            DB::table('job_skills')
                ->insert([
                    'job_id'	=>	$job->id,
                    'skill_id'	=>	$s_id,
                    'point'		=>	$point,
                ]);
        }

        return redirect('job/detail/'.$job->id);
    }

    public function searchQuery(Request $request){

        $data_sent = json_decode($request->data_send);
        if($data_sent->type == "name-filter"){
            $jobs = DB::table('jobs')
            ->select('jobs.*',DB::raw('GROUP_CONCAT(job_skills.skill_id) as skills'),
             DB::raw('GROUP_CONCAT(job_skills.point) as points'))
            ->where('jobs.name','like','%'.$data_sent->query.'%')
            ->join('job_skills','jobs.id','=','job_skills.job_id')
            ->groupBy('jobs.id')->paginate(15);

            return view('search_result_subpage',compact('jobs'));
        }
        else{
            $data_sent = $data_sent->data;

            $skill_search = [];

            foreach ($data_sent as $data) {
                array_push($skill_search,$data->id);
            }
            $jobs = DB::table('jobs')
            ->select('jobs.*',DB::raw('GROUP_CONCAT(job_skills.skill_id) as skills'),
             DB::raw('GROUP_CONCAT(job_skills.point) as points'))
            ->join('job_skills','jobs.id','=','job_skills.job_id')
            ->whereIn('job_skills.skill_id',$skill_search)
            ->groupBy('jobs.id')->paginate(15);

            //compact jobs artinya dia parsing $jobs dengan nama jobs
            //cara lain parsing data ke view
            return view('search_result_subpage',compact('jobs'));
        }

    }

    public function showJobSearch(){
      return view('job.job_search');
    }

	public function showDescriptionJob($id)
	{
		$job = Job::where('id', $id)->first();

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
