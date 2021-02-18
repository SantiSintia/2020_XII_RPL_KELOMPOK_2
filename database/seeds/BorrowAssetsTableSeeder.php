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
            'bas_id' => 1,
            'bas_ass_id' => 3,
            'bas_brw_id' => 1,
            'bas_brs_id' => 1,
            ]);
    }
}
