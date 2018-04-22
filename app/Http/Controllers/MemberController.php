<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index() {
		return view('members.index');
	}

	public function register() {
		return view('members.register');
	}

	public function createUser(Request $request) {
		$request->validate([
			'name' => 'required|min:4',
			'password' => 'required|min:8',
			'email' => 'required|email',
			'address' => 'required|min:5',
			'telp' => 'required|min:8',
			'tgllahir' => 'required|date_format:Y-m-d',
		]);

		Member::create([
			'm_name' => $request->name,
			'm_password' => $request->password,
			'm_email' => $request->email,
			'm_address' => $request->address,
			'm_telp' => $request->telp,
			'm_borndate' => $request->tgllahir,
		]);
		return redirect('/members/');
	}


    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        
        $task = Task::create(['title' => $request->title,'description' => $request->description]);
        return redirect('/tasks/'.$task->id);
    }
}
