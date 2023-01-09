<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            [
                'id'=> 1,'name' => 'legrand', 'address' => 'cotonou benin', 'city'=> 'cotonou', 'state' => 'atlantique', 'country' => 'benin', 'pincode' => '00229', 'mobile' => '+22961159868', 'email' => 'legrand@admin.com', 'status' => 0
            ]
        ];
        Vendor::insert($vendorRecords);
    }
}
