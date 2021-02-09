<?php

use Illuminate\Database\Seeder;

class BorrowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('borrows')->insert([
            'brw_usr_id' => 3,
            'brw_ass_id' => 8,
            ]);
        
    }
}
