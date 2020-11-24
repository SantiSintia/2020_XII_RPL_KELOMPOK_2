<?php

use Illuminate\Database\Seeder;

class OriginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('origins')->insert([
            'ori_code' => 'INV.YYS',
            'ori_name' => "Yayasan",
            ]);
        
            DB::table('origins')->insert([
            'ori_code' => 'INV.SMK',
            'ori_name' => "Sekolah",
            ]);

            DB::table('origins')->insert([
            'ori_code' => 'INV.HIBAH',
            'ori_name' => "Hibah",
            ]);
        

    }
}
