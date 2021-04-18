<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
         $this->call(TeachersTableSeeder::class);
         $this->call(StudentsTableSeeder::class);
         $this->call(AssetCategoriesTableSeeder::class);
         $this->call(AssetTypesTableSeeder::class);
         $this->call(AssetsTableSeeder::class);
         $this->call(AssetDescriptionsTableSeeder::class);
         $this->call(OriginsTableSeeder::class); 
         //$this->call(BorrowStatusesTableSeeder::class);
         $this->call(BorrowsTableSeeder::class);
         $this->call(BorrowAssetsTableSeeder::class);
         //$this->call(RestoresTableSeeder::class);
         $this->call(ReplacementAssetsTableSeeder::class);
         $this->call(ReplacementsTableSeeder::class);
         $this->call(LocationAssetsTableSeeder::class);
    }
}


