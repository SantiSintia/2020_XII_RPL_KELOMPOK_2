<?php

use Illuminate\Database\Seeder;

class BorrowStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrows_statuses')->insert([
            'brs_id' => 1,
            'brs_status' => 0,
            ]);
    }
}
