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
            'brw_usr_id' => 2,
            'brw_status' => 1,
            ]);

         DB::table('borrows')->insert([
            'brw_usr_id' => 3,
            'brw_status' => 1,
            ]);

         DB::table('borrows')->insert([
            'brw_usr_id' => 5,
            'brw_status' => 1,
            ]);
         
         DB::table('borrows')->insert([
            'brw_usr_id' => 6,
            'brw_status' => 1,
            ]);
  

         // DB::table('borrows')->insert([
         //    'brw_usr_id' => 4,
         //    'brw_status' => 1,
         //    ]);
        
    }
}
