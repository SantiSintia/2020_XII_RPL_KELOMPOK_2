<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>13,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '001/P01.001/INV.YYS/2016',
            'ass_name' => 'Kursi Siswa ke 1',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);
    	
       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>13,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '002/P01.001/INV.YYS/2016',
            'ass_name' => 'Kursi Siswa ke 2',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);

       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>13,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '003/P01.001/INV.YYS/2016',
            'ass_name' => 'Kursi Siswa ke 3',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);

    	
       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>14,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '001/P01.002/INV.YYS/2016',
            'ass_name' => 'Kursi Guru ke 1',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);
    	
       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>14,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '002/P01.002/INV.YYS/2016',
            'ass_name' => 'Kursi Guru ke 2',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);
    	
       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>15,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '001/P01.003/INV.YYS/2016',
            'ass_name' => 'Kursi Tunggu ke 1',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);

       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>15,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '002/P01.003/INV.YYS/2016',
            'ass_name' => 'Kursi Tunggu ke 2',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);

       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>16,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '001/P01.004/INV.YYS/2016',
            'ass_name' => 'Kursi Set ke 1',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);

       DB::table('assets')->insert([
            'ass_asset_category_id' => 6,
            'ass_asset_type_id' =>16,
            'ass_origin_id' => 1,
            'ass_year' => '2016',
            'ass_registration_code' => '002/P01.004/INV.YYS/2016',
            'ass_name' => 'Kursi Set ke 2',
            'ass_price' => '50000',
            'ass_status'=> 1,
            'ass_la_id'=> 2
            ]);
    }
}
