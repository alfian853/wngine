<?php

use Illuminate\Database\Seeder;
use App\Company;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'c_name' => 'ALFIAN CORP',
            'email' => 'alcorp@wngine.com',
            'c_address' => 'INFORMATIKA',
            'password' => Hash::make('alfian'),
            'c_telp' => '1234567890',
            'remember_token' => 'a',
        ]);

        Company::create([
            'c_name' => 'ALCREDO CORP',
            'email' => 'edocorp@wngine.com',
            'c_address' => 'INFORMATIKA',
            'password' => Hash::make('edo'),
            'c_telp' => '1234567890',
            'remember_token' => 'b',
        ]);
    }
}
