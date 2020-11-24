<?php

use Illuminate\Database\Seeder;

class AssetDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 1,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna coklat',
 			'asd_condition' => 'baru'

            ]);
    }
}
