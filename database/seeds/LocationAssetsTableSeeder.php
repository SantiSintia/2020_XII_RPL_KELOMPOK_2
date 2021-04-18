<?php

use Illuminate\Database\Seeder;

class LocationAssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_assets')->insert([
            'la_asc_id' => 2,
            'la_ast_id' => 1,
            'la_ass_id' => 1
            ]);

        DB::table('location_assets')->insert([
            'la_asc_id' => 2,
            'la_ast_id' => 2,
            'la_ass_id' => 2
            ]);

        // DB::table('location_assets')->insert([
        //     'la_asc_id' => 3,
        //     'la_ast_id' => 1,
        //     'la_ass_id' => 3
        //     ]);

        // DB::table('location_assets')->insert([
        //     'la_asc_id' => 4,
        //     'la_ast_id' => 2,
        //     'la_ass_id' => 4
        //     ]);
    }
}
