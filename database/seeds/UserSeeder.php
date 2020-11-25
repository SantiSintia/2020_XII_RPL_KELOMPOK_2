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
            'usr_name' => 'Hamdan',
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

        $student = User::create([
            'usr_name' => 'Student',
            'role_id'  => '2',
            'usr_email' => 'student@gmail.com',
            'usr_phone' => '087654321234',
            'usr_gender' => 'male',
            'usr_password' => Hash::make('student123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

        $student->assignRole('student');

        $teacher = User::create([
            'usr_name' => 'Maulani',
            'role_id'  =>   '3',
            'usr_email' => 'maulani@gmail.com',
            'usr_phone' => '088987654321',
            'usr_gender' => 'female',
            'usr_password' => Hash::make('maulani123'),
            'usr_email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'usr_verification_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'usr_is_active' => true,
        ]);

  /*      $teacher->assignRole('teacher');

        $stafftu = User::create([
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
