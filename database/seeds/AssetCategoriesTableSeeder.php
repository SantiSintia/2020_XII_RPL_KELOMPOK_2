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
        	'asc_code' => B01,
        	'asc_original_code' => 1,
        	'asc_name' => 'lantai 1',
        	'asc_parent_asset_categories_id' => 1
        	]);
    

    }
}
