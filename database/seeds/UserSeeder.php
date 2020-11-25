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
        $admin = User::create([
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

        $admin->assignRole('admin');

        $teacher = User::create([
            'usr_name' => 'Dewi Astri Indriani',
            'role_id'  =>   '4',
            'usr_email' => 'indrianidewiastri@gmail.com',
            'usr_phone' => '082295205892',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('dewi123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

     $teacher->assignRole('teacher');



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

             $staff1 = User::create([
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

        $staff1->assignRole('staff');

        $staff2 = User::create([
            'usr_name' => 'Enjang Suryana',
            'role_id' =>'4',
            'usr_email' => 'enjangsuryana67@gmail.com',
            'usr_phone' => '085224456644',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('enjang123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $staff2->assignRole('staff');

        $staff3 = User::create([
            'usr_name' => 'Nuron Mukmin',
            'role_id' =>'4',
            'usr_email' => 'mukminnuron@gmail.com',
            'usr_phone' => '089628295123',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('nuron123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $staff3->assignRole('admin');

        $staff4 = User::create([
            'usr_name' => 'Rifka',
            'role_id' =>'4',
            'usr_email' => 'rifka22082000@gmail.com',
            'usr_phone' => '085659711213',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('rifka123123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $staff4->assignRole('staff');



  /*      $stafftu = User::create([
            'usr_name' => 'Rifka',
            'usr_email' => 'rifka@gmail.com',
            'usr_phone' => '089912345678',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('rifka123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $stafftu->assignRole('staff');
*/
    }
}
