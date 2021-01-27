<?php

use Illuminate\Database\Seeder;

class AssetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 2,
            'ast_code' => 'B01.001',
            'ast_original_code' => 1,
            'ast_name' => 'Ruangan 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 2,
            'ast_code' => 'B01.002',
            'ast_original_code' => 2,
            'ast_name' => 'Ruangan 2'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 2,
            'ast_code' => 'B01.003',
            'ast_original_code' => 3,
            'ast_name' => 'Toilet 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 2,
            'ast_code' => 'B01.004',
            'ast_original_code' => 4,
            'ast_name' => 'Toilet 2'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 3,
            'ast_code' => 'B02.001',
            'ast_original_code' => 1,
            'ast_name' => 'Ruangan 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 3,
            'ast_code' => 'B02.002',
            'ast_original_code' => 2,
            'ast_name' => 'Ruangan2'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 3,
            'ast_code' => 'B02.003',
            'ast_original_code' => 3,
            'ast_name' => 'Toliet 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 3,
            'ast_code' => 'B02.004',
            'ast_original_code' => 4,
            'ast_name' => 'Toliet 2'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 4,
            'ast_code' => 'B03.001',
            'ast_original_code' => 1,
            'ast_name' => 'Ruangan 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 4,
            'ast_code' => 'B03.002',
            'ast_original_code' => 2,
            'ast_name' => 'Ruangan 2'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 4,
            'ast_code' => 'B03.003',
            'ast_original_code' => 3,
            'ast_name' => 'Toilet 1'
            ]);
        
    	
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 4,
            'ast_code' => 'B03.004',
            'ast_original_code' => 4,
            'ast_name' => 'Toilet 2'
            ]);
        
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 6,
            'ast_code' => 'P01.001',
            'ast_original_code' => 1,
            'ast_name' => 'Kursi Siswa'
            ]);
        
       
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 6,
            'ast_code' => 'P01.002',
            'ast_original_code' => 2,
            'ast_name' => 'Kursi Guru'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 6,
            'ast_code' => 'P01.003',
            'ast_original_code' => 3,
            'ast_name' => 'Kursi Tunggu'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 6,
            'ast_code' => 'P01.004',
            'ast_original_code' => 4,
            'ast_name' => 'Kursi Set'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 7,
            'ast_code' => 'P02.001',
            'ast_original_code' => 1,
            'ast_name' => 'Meja Guru'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 7,
            'ast_code' => 'P02.002',
            'ast_original_code' => 2,
            'ast_name' => 'Meja Siswa'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 8,
            'ast_code' => 'P03.001',
            'ast_original_code' => 1,
            'ast_name' => 'Lemari'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 8,
            'ast_code' => 'P03.002',
            'ast_original_code' => 2,
            'ast_name' => 'Rak'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 9,
            'ast_code' => 'P04.001',
            'ast_original_code' => 1,
            'ast_name' => 'TV'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 9,
            'ast_code' => 'P04.002',
            'ast_original_code' => 2,
            'ast_name' => 'Laptop'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 9,
            'ast_code' => 'P04.003',
            'ast_original_code' => 3,
            'ast_name' => 'Projector'
            ]);
        
          DB::table('asset_types')->insert([
            'ast_asset_categories_id' => 9,
            'ast_code' => 'P04.004',
            'ast_original_code' => 4,
            'ast_name' => 'AC'
            ]);
        
        
         
        
    }
}
