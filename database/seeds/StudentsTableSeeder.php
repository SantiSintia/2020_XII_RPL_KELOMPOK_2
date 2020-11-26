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
            'std_usr_id' => 3,
            'std_nis' => '1819.10.054',
            'std_class' => "XII-RPL"
            ]);
   
    }
}
