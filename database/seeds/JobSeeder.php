<?php

use Illuminate\Database\Seeder;
use App\Job;
use App\Skill;
use App\Company;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        $company_count = count(Company::all());

        $faker = Faker::create();
        foreach(range(1,55) as $index)
        {
            $job = Job::create([
                'name' => $faker->name,
                'description' => $faker->paragraph(1),
                'company_id' => rand(1, $company_count),
                'upload_date' => date('Y-m-d'),
                'finish_date' => '2018-12-6',
                'document' => $faker->url,
            ]);

            $random_skill_count = rand(1, $skill_count);
            $arr = range(1, $random_skill_count);

            for($i=0; $i<count($arr); $i++)
            {
                $skill_id = rand(1, count($arr));
                array_splice($arr, $skill_id, 1);
                DB::table('job_skills')
                    ->insert([
                        'job_id' => $job->id,
                        'skill_id' => $skill_id,
                        'point' => rand(1, 25),
                    ]);
            }
        }
    }
}
