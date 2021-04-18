<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = User::create([
            'usr_name' => 'admin',
            'role_id' =>'1',
            'usr_email' => 'admin@gmail.com',
            'usr_phone' => '089876543212',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('admin123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $admin1->assignRole('admin');


        $teacher1 = User::create([
            'usr_name' => 'Dewi Astri Indriani',
            'role_id'  =>   '2',
            'usr_email' => 'indrianidewiastri@gmail.com',
            'usr_phone' => '082295205892',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('dewi123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $teacher1->assignRole('teacher');


        $student1 = User::create([
            'usr_name' => 'Santi Sintiawati',
            'role_id'  => '3',
            'usr_email' => 'santi@gmail.com',
            'usr_phone' => '087741344053',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('santi123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $student1->assignRole('student'); 

        $student2 = User::create([
            'usr_name' => 'Rinaldi',
            'role_id'  => '3',
            'usr_email' => 'rinaldi@gmail.com',
            'usr_phone' => '085671344034',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('rinaldi123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $student2->assignRole('student'); 


        // $student3 = User::create([
        //     'usr_name' => 'Tia Anggraeni',
        //     'role_id'  => '3',
        //     'usr_email' => 'tia@gmail.com',
        //     'usr_phone' => '083758693254',
        //     'usr_gender' => 'female',
        //     'usr_password' => Hash::make('tia123123'),
        //     'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
        //     'usr_is_active' => true,
        // ]);

        // $student3->assignRole('student'); 


        // $guru = User::create([
        //     'usr_name' => 'Leni Maulani',
        //     'role_id'  =>   '2',
        //     'usr_email' => 'leni@gmail.com',
        //     'usr_phone' => '082465378421',
        //     'usr_gender' => 'female',
        //     'usr_password' => Hash::make('leni123123'),
        //     'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
        //     'usr_is_active' => true,
        // ]);

        // $guru->assignRole('teacher');



        $admin2 = User::create([
            'usr_name' => 'Hamdan Firmansyah',
            'role_id' =>'4',
            'usr_email' => 'odney04@gmail.com',
            'usr_phone' => '089613272481',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('hamdan123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $admin2->assignRole('admin');




    }
}
