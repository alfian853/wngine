<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;
use App\Company;
use App\Skill;
use Storage;
use Validator;
use Session;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
/*
  status jobs
  0 = belum submit
  1 = sudah di cek
  2 = ada update lagi
  3 = sudah submit, belum di cek
  dimunculkan di list project dengan order descending
*/

    public function __construct()
    {
        $this->middleware('auth:company,member')
            ->except([
                'searchQuery',
                'showDescriptionJob',
                'showJobSearch',
            ]
        );
    }

    public function homeQuery(Request $request){

    }

    public function showPostingJobForm(){
        $user = Auth::user();

        if($user->cannot('create', Job::class))
            return redirect('/home');

        $skill = Skill::all();

        $skill_list = array();
        foreach($skill as $s)
            $skill_list[$s->id] = $s->name;

        return view('job.job_create', ['skill' => $skill_list]);
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
            ->select('jobs.*','company.c_name','company.c_image',
             DB::raw('GROUP_CONCAT(job_skills.skill_id) as skill_list'),
             DB::raw('GROUP_CONCAT(job_skills.point) as point_list'),
             DB::raw('sum(job_skills.point) as point')
             )
            ->join('job_skills','jobs.id','=','job_skills.job_id')
            ->join('skills','skills.id','=','job_skills.skill_id')
            ->join('company','company.c_id','=','jobs.company_id')
            ->where('jobs.name','like','%'.$data_sent->query.'%')
            ->orWhere('company.c_name','like','%'.$data_sent->query.'%')
            ->groupBy('jobs.id')->paginate(10);
            foreach ($jobs as $job) {
                $job->skill_list = preg_split("/,/",$job->skill_list);
            }
            //dd($jobs);
            return view('job.search_result_subpage',compact('jobs'));
        }
        else{
            $data_sent = $data_sent->data;

            $skill_search = [];

            foreach ($data_sent as $data) {
                array_push($skill_search,$data->id);
            }
            $jobs = DB::table('jobs')
            ->select('jobs.id as jid')
            ->join('job_skills',function($join) use($skill_search) {
                $join->on('jobs.id','=','job_skills.job_id')->whereIn('job_skills.skill_id',$skill_search);
            })->distinct()->get();
            $target_id = [];
            foreach ($jobs as $job) {
                array_push($target_id,$job->jid);
            }
            $jobs = DB::table('jobs')
            ->select('jobs.*','company.c_name','company.c_image',
             DB::raw('GROUP_CONCAT(job_skills.skill_id) as skill_list'),
             DB::raw('GROUP_CONCAT(job_skills.point) as point_list'),
             DB::raw('sum(job_skills.point) as point')
             )
            ->join('job_skills',function($join) use($target_id) {
                $join->whereIn('jobs.id',$target_id);
                $join->on('jobs.id','=','job_skills.job_id');
            })
            ->join('company','company.c_id','=','jobs.company_id')
            ->groupBy('jobs.id')->paginate(10);

            foreach ($jobs as $job) {
                $job->skill_list = preg_split("/,/",$job->skill_list);
            }

            return view('job.search_result_subpage',compact('jobs'));
        }

    }

    public function showJobSearch(){
      return view('job.job_search');
    }

  	public function showDescriptionJob($id)
      {
      $job = Job::find($id);
  		$data = array();
      $data['id'] = $id;
  		$data['job_name'] = $job->name;
  		$data['start_date'] = $job->upload_date;
  		$data['due_date'] = $job->finish_date;
      $company = Company::select('c_name','c_image')
								->where('c_id', $job->company_id)
								->first();
  		$data['company_name'] = $company->c_name;
      $data['company_photo'] = asset('company_photo').'/'.$company->c_image;
  		$data['description'] = $job->description;
  		$data['document_url'] = asset('job_documents').'/'.$job->document;
  		$data['skills'] = array();

  		$job_skill = DB::table('job_skills')
  						->where('job_id', $job->id)
  						->get();
          $total = 0;
  		foreach($job_skill as $v)
  		{
  			$skill = Skill::select('name')->where('id', $v->skill_id)->first()->name;
  			$data['skills'][$skill] = $v->point;
              $total+=$v->point;
  		}
      $data['total_point'] = $total;
      if(Auth::guard('member')->check()){
        $worker = self::getWorkerData($id);
        $data['had_taken'] = false;
        if($worker != null){
          $data['had_taken'] = true;
          $data['file_name'] = null;
          $data['file_path'] = null;
          $data['submit_time'] = null;

          if($worker->submission_path != null){
            $data['file_name'] = substr($worker->submission_path,20);
            $data['file_path'] = asset('job_submissions').'/'.$worker->submission_path;
            $data['submit_time'] = $worker->last_submit_time;
          }
        }
      }
      return view('job.job_description', [
          'data' => $data,
          'job' => $job,
      ]);
  	}

    public function getWorkerData($jobId){
        $res = DB::table('jobs_taken')->select('worker_email','submission_path','last_submit_time')
        ->where('worker_email','=',Auth::guard('member')->user()->email)
        ->where('job_id','=',$jobId)->first();
        return $res;
    }

    public function takeJob(Request $request){
        $job_id = json_decode($request["param"],true)['job_id'];
        if($job_id != null){
            $counter = DB::table('jobs_taken')->select(DB::raw('count(job_id) as job_count'))
            ->where('worker_email','=',Auth::guard('member')->user()->email)
            ->groupBy('worker_email')->first();
            if($counter != null && $counter->job_count > 4){
                return "Sorry, you can't take more than 5 job";
            }
            if(self::getWorkerData($job_id) != null){
                return response()->json([
                    'status' => 'failed',
                    'message' => 'You had taken this job before'
            ]);
            }
            DB::table('jobs_taken')->insert(
                ['job_id' => $job_id,
                 'worker_email' => Auth::guard('member')->user()->email,
                 'status' => 0,
                 'comment' => '',
                 'last_submit_time' =>  date("Y-m-d H:i:s")
               ]
            );
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => "don't try to hacking us *_*"
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => "success taking the job, Do your best :)"
        ]);
    }

    public function companyProjectList(){
        $user = Auth::user();

        if($user->cannot('companyListJob', Job::class))
            return redirect('/home');

        $jobs = Job::where('company_id', $user->c_id)->get();
        foreach ($jobs as $job) {
            $job->isFinish = strtotime($job->finish_date) < strtotime(date('Y-m-d'));
        }

        return view('job.company-project-list', compact('jobs'));
    }

    public function memberProjectList(){
        $user = Auth::user();

        if($user->cannot('memberListJob', Job::class)){
          Session::flash('alert','Anda belum login!');
          Session::flash('alert-type','failed');
          return redirect('/home');
        }

        $jobs = DB::table('jobs_taken')
            ->select('*')
            ->where('worker_email', $user->email)
            ->join('jobs','jobs.id','=','jobs_taken.job_id')->get();

        foreach ($jobs as $job)
        {
            $job->isFinish = strtotime($job->finish_date) < strtotime(date('Y-m-d'));
            if($job->last_submit_time != null)
            {
                $job->submission_path = asset('job_submissions').'/'.$job->submission_path;
            }
        }

        return view('job.member-project-list', compact('jobs'));
    }

    public function projectAdmin($id){

      $job = DB::table('jobs')->select('*')
            ->where('id','=',$id)
            ->where('company_id','=',Auth::guard('company')->user()->c_id)
            ->first();
      if($job == null){
          Session::flash('alert','Anda tidak berhak mengakses laman tersebut');
          Session::flash('alert-type','failed');
          return redirect(route('home'));
      }
      $isFinish = strtotime($job->finish_date) < strtotime(date('Y-m-d'));
      $lists = DB::table('jobs_taken')->select('*')
            ->join('members','members.email','=','jobs_taken.worker_email')
            ->where('job_id','=',$id)
            ->orderBy('status','desc')
            ->get();

      if($isFinish){
        $skills = DB::table('job_skills')->select('*')
        ->where('job_id','=',$id)
        ->join('skills','skills.id','=','skill_id')
        ->get();
        return view('job.project-list-detail-finished', compact('lists'))
        ->with(['job_id' => $id,'skills' => $skills]);
      }
      else{
        return view('job.project-list-detail', compact('lists'))->with(['job_id' => $id]);
      }

    }

    public function updateComment(Request $request){
      $data = json_decode($request->data_send,true);
      DB::table('jobs_taken')
      ->where('job_id','=',$data['job_id'])
      ->where('worker_email','=',$data['email'])
      ->update(['comment' => $data['comment']]);
      var_dump($data);
    }

    public function submitJob(Request $request){
      if($request->file('file') != null){
        $path = Storage::putFile('public', $request->file('file'));
        // dd($request->file('file'));
        $targetPath = date('Y-m-d-H-m-s').'-'.$request->file('file')->getClientOriginalName();
        // dd('errorsini2'.$request->file('file'));
        $worker = self::getWorkerData($request->id);
        $oldfile = $worker->submission_path;
        $status = 3;
        if($oldfile != null){
          Storage::delete('job_submissions/'.$oldfile);
          $status = 2;
        }
        $updateTime = date("Y-m-d H:i:s");
        DB::table('jobs_taken')
        ->where('job_id','=',$request->id)
        ->where('worker_email','=',Auth::guard('member')->user()->email)
        ->update(
          [
            'submission_path' => $targetPath,
            'last_submit_time' => $updateTime,
            'file_path' => 'job_submissions/'.$targetPath
          ]
        );
        Storage::move($path,'job_submissions/'.$targetPath);
        return response()->json([
          'status' => 'success',
          'message' => $updateTime
        ]);
      }
      else{
        return response()->json([
            'status' => 'failed',
            'message' => ''
        ]);
      }
    }

    public function getSubmissionUrl(Request $request){
      $data = json_decode($request->data_send,true);
      DB::table('jobs_taken')
      ->where('worker_email','=',$data['email'])
      ->where('job_id','=',$data['job_id'])
      ->update(['status' => 1]);
      $res = DB::table('jobs_taken')->select('submission_path')
      ->where('worker_email','=',$data['email'])
      ->where('job_id','=',$data['job_id'])->first();

      return response()->json([
          'status' => 'success',
          'url' => asset('job_submissions').'/'.$res->submission_path
      ]);
    }

    public function payWorker(Request $request){
      $data = json_decode($request->data_send,true);
      //validasi request vs data di table, poin request <= data di table
      $job_skills = DB::table('job_skills')->select('*')->where('job_id','=',$request->id)->get();
      // dd($data);
      foreach ($job_skills as $skill) {
        // dd((int)$data['skill_list'][$skill->skill_id]);
        // dd($skill->point);
        if(array_key_exists((string)$skill->skill_id, $data['skill_list']) ){
          if((int)$data['skill_list'][$skill->skill_id] > $skill->point ){
            Session::flash('alert','Invalid request');
            Session::flash('alert-type','failed');
            return redirect(route('home'));
          }
        }
      }
      $total = 0;
      foreach ($data['skill_list'] as $key => $value) {
        DB::table('job_skills')
        ->where('job_id','=',$request->id)
        ->where('skill_id','=',$key)
        ->decrement('point',(int)$value);
        $query = DB::table('member_points')
        ->where('member_id','=',$data['worker_id'])
        ->where('skill_id','=',$key);
        if($query->first() == null){
          DB::table('member_points')
          ->insert([
            'member_id' => $data['worker_id'],
            'skill_id' => $key,
            'point' => (int)$value
          ]);
        }
        else{
          $query->increment('point',(int)$value);
        }
        $total+=(int)$value;
      }

      DB::table('members')->where('m_id','=',$data['worker_id'])
      ->increment('claimable_point',$total);
      


    }

}
