<?php

use Illuminate\Database\Seeder;

class ReplacementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replacements')->insert([
            'r_usr_id' => 2,
            'r_bas_id' => 1,
            'r_ra_id' => 1,
            ]);

        DB::table('replacements')->insert([
            'r_usr_id' => 3,
            'r_bas_id' => 2,
            'r_ra_id' => 2,
            ]);

        // DB::table('replacements')->insert([
        //     'r_usr_id' => 4,
        //     'r_bas_id' => 3,
        //     'r_ra_id' => 3,
        //     ]);

    }
}
