<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankDetails = [
            [
                'id' => 1, 'vendor_id' => 1, 'account_holder_name' => 'DONOU Norman', 'bank_name' => 'ECOBANK', 'account_number' => '0123456789', 'bank_ifsc_code' => 'S0E1234'
            ]
        ];
        VendorsBankDetails::insert($bankDetails);
    }
}
