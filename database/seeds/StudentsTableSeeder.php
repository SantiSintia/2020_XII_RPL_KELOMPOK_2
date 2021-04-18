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
            'std_nis' => '1819.10.057',
            'std_class' => "XII RPL 1"
            ]);
   
          DB::table('students')->insert([
            'std_usr_id' => 4,
            'std_nis' => '1819.10.069',
            'std_class' => "XII RPL 2"
            ]);
   
          // DB::table('students')->insert([
          //   'std_usr_id' => 5,
          //   'std_nis' => '1819.10.080',
          //   'std_class' => "XII MM"
          //   ]);
   
    }
}
