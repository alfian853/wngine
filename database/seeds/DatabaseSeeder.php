<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MemberSeeder::class,
            CompanySeeder::class,
            SkillSeeder::class,
            JobSeeder::class,
        ]);
    }
}
