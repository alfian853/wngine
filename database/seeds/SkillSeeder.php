<?php

use Illuminate\Database\Seeder;
use App\Skill;


class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
			'name'	=>	'Frontend Development',
		]);

        Skill::create([
			'name'	=>	'Backend Development',
		]);

        Skill::create([
			'name'	=>	'Android',
		]);
    }
}
