<?php

use Illuminate\Database\Seeder;

class RestoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
         DB::table('restores')->insert([
            'rst_usr_id' => 3,
            'rst_ass_id' => 1,
            'rst_brw_id' => 1,
            'rst_date' => '2021/02/19',
            'rst_condition' => 'Baik'
            ]);
    
    }
}
