<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('teachers')->insert([
            'tc_usr_id' => 8,
         
            ]);
        
    }
}
