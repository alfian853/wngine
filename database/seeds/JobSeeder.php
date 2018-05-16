<?php

use Illuminate\Database\Seeder;
use App\Job;
use App\Skill;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill_count = count(Skill::all());

        $job = Job::create([
            'name' => 'Android Layouting',
            'description' => 'Making layout for simple android app',
            'company_id' => 1,
            'upload_date' => date('Y-m-d'),
            'finish_date' => '2018-12-12',
            'document' => 'dummy3',
        ]);

        $random_skill_count = rand(1, $skill_count);

        for($i=0; $i<$random_skill_count; $i++)
        {
            DB::table('job_skills')
                ->insert([
                    'job_id' => $job->id,
                    'skill_id' => rand(1, $skill_count),
                    'point' => rand(1, 100),
                ]);
        }

        $job = Job::create([
            'name' => 'Alfian Android',
            'description' => 'Bantu Alfian bikin apps sampah untuk android',
            'company_id' => 1,
            'upload_date' => date('Y-m-d'),
            'finish_date' => '2018-12-1',
            'document' => 'dummy1',
        ]);

        $random_skill_count = rand(1, $skill_count);

        for($i=0; $i<$random_skill_count; $i++)
        {
            DB::table('job_skills')
                ->insert([
                    'job_id' => $job->id,
                    'skill_id' => rand(1, $skill_count),
                    'point' => rand(1, 100),
                ]);
        }

        $job = Job::create([
            'name' => 'Web PHP/JS Edo',
            'description' => 'Edo butuh bantuan untuk membuat web ga jelas',
            'company_id' => 2,
            'upload_date' => date('Y-m-d'),
            'finish_date' => '2018-12-6',
            'document' => 'dummy2',
        ]);

        $random_skill_count = rand(1, $skill_count);

        for($i=0; $i<$random_skill_count; $i++)
        {
            DB::table('job_skills')
                ->insert([
                    'job_id' => $job->id,
                    'skill_id' => rand(1, $skill_count),
                    'point' => rand(1, 100),
                ]);
        }
    }
}
