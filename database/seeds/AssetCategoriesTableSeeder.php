<?php

use Illuminate\Database\Seeder;

class AssetCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'B',
            'asc_original_code' =>'',
            'asc_name' => 'Bangunan',
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'B01',
            'asc_original_code' => '1',
            'asc_name' => 'Lantai 1',
            'asc_parent_asset_categories_id' => 1
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'B02',
            'asc_original_code' => '2',
            'asc_name' => 'Lantai 2',
            'asc_parent_asset_categories_id' => 1
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'B03',
            'asc_original_code' => '3',
            'asc_name' => 'lantai 3',
            'asc_parent_asset_categories_id' => 1
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'P',
            'asc_original_code' => '',
            'asc_name' => 'Barang'
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'P01',
            'asc_original_code' => '1',
            'asc_name' => 'Kursi',
            'asc_parent_asset_categories_id' => 5
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'P02',
            'asc_original_code' => '2',
            'asc_name' => 'Meja',
            'asc_parent_asset_categories_id' => 5
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'P03',
            'asc_original_code' => '3',
            'asc_name' => 'Lemari/Rak',
            'asc_parent_asset_categories_id' => 5
            ]);
        
        DB::table('asset_categories')->insert([
            'asc_code' => 'P04',
            'asc_original_code' => '4',
            'asc_name' => 'Elektronik',
            'asc_parent_asset_categories_id' => 5
            ]);
        
    }
}
