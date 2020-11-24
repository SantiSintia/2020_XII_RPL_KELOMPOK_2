<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          DB::table('students')->insert([
            'std_usr_id' => 2,
            'std_name' => 'Student',
            'std_nis' => '1819.10.077',
            'std_class' => "XII-RPL"
            ]);
        
    }
}
