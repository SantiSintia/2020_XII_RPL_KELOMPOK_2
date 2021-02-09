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
            'brw_ass_id' => 1,
            'brw_amount' => 1,
            'brw_date' => '2021/02/09',
            'brw_licensor' => 'Bu Rifka',
            'brw_status' => 1
            ]);
        
    }
}
