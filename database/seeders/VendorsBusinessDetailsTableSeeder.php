<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessDetails = [
            [
                'id'=> 1,
                'vendor_id'=>1,
                'shop_name'=>'LegrandShop',
                'shop_address'=> 'cotonou benin',
                'shop_city'=> 'cotonou',
                'shop_state'=> 'atlantique',
                'shop_country'=> 'benin',
                'shop_pincode'=> '00229',
                'shop_mobile'=> '+22962411277',
                'shop_website'=> '',
                'shop_email'=> 'legrandshop@admin.com',
                'address_proof'=> 'visa',
                'address_proof_image'=> 'test.jpg',
                'business_licence_number'=> '02158745896',
                'gst_number'=> 'VAT2114',
                'pan_number'=> '25896587458',
            ]
        ];
        VendorsBusinessDetails::insert($businessDetails);
    }
}
