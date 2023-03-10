<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BrandsTableSeeder;
use Database\Seeders\SectionTableSeeder;
use Database\Seeders\VendorsTableSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\VendorsBankDetailsTableSeeder;
use Database\Seeders\VendorsBusinessDetailsTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AdminsTableSeeder::class);
        //$this->call(VendorsTableSeeder::class);
        //$this->call(VendorsBankDetailsTableSeeder::class);
        //$this->call(VendorsBusinessDetailsTableSeeder::class);
        //$this->call(SectionTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
        $this->call(BrandsTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
