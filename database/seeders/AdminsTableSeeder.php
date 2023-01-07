<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
              'id'=>1, 'name'=>'super admin', 'type'=>'superadmin','vendor_id'=>0,'mobile'=>'+22962411277','email'=>'superadmin@admin.com','password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','image'=>'','status'=>1
            ],

            [
                'id' => 2, 'name' => 'Admin', 'type' => 'admin', 'vendor_id' => 1, 'mobile' => '+22969270236', 'email' => 'admin@admin.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'image' => '', 'status' => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
