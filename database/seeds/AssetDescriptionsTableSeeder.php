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
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 2,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna coklat',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 3,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna coklat',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 4,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna coklat',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 5,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna biru',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 6,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna biru',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 7,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna biru',
            'asd_condition' => 'baru'

            ]);
         DB::table('asset_descriptions')->insert([
            'asd_ass_id' => 8,
            'asd_inggridient' =>'kayu',
            'asd_spesification' => 'warna biru',
 			'asd_condition' => 'baru'

            ]);
    }
}
