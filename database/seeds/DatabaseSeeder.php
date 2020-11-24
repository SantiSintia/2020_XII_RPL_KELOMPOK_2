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
    }
}


