<?php

use Illuminate\Database\Seeder;

class BorrowAssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('borrow_assets')->insert([
            'bas_ass_id' => 3,
            'bas_brw_id' => 1,
            'bas_status' => 1,
            ]);

         DB::table('borrow_assets')->insert([
            'bas_ass_id' => 4,
            'bas_brw_id' => 2,
            'bas_status' => 1,
            ]);

         // DB::table('borrow_assets')->insert([
         //    'bas_ass_id' => 5,
         //    'bas_brw_id' => 3,
         //    'bas_status' => 1,
         //    ]);
    }
}
