<?php

use Illuminate\Database\Seeder;
use App\Member;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'm_name' => 'Alfian Liao',
            'email' => 'alfian@wngine.com',
            'm_borndate' => '01/01/01',
            'm_address' => 'INFORMATIKA',
            'password' => Hash::make('alfian'),
            'm_telp' => '1234567890',
            'remember_token' => 'a',
        ]);

        Member::create([
            'm_name' => 'Alcredo Simanjuntak',
            'email' => 'edo@wngine.com',
            'm_borndate' => '01/01/01',
            'm_address' => 'INFORMATIKA',
            'password' => Hash::make('edo'),
            'm_telp' => '1234567890',
            'remember_token' => 'b',
        ]);

        Member::create([
            'm_name' => 'Rahadian Putra',
            'email' => 'rahadian@wngine.com',
            'm_borndate' => '01/01/01',
            'm_address' => 'INFORMATIKA',
            'password' => Hash::make('rahadian'),
            'm_telp' => '1234567890',
            'remember_token' => 'c',
        ]);


    }
}
