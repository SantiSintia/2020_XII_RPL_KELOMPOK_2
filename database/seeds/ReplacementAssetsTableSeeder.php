<?php

use Illuminate\Database\Seeder;

class ReplacementAssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replacement_assets')->insert([
            'ra_asd_id' => 1,
            'ra_status' => 1,
            ]);

        DB::table('replacement_assets')->insert([
            'ra_asd_id' => 2,
            'ra_status' => 1,
            ]);

        // DB::table('replacement_assets')->insert([
        //     'ra_asd_id' => 3,
        //     'ra_status' => 2,
        //     ]);

    }
}
