<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssociateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $associates = [
            [
                'name' => 'Abdullah Al-Mansouri',
                'email' => 'abdullah.almansouri@franchise.com',
                'phone' => '+966-555-1001',
                'franchise_location' => 'Downtown Plaza',
                'start_date' => '2023-01-15',
                'status' => 'active',
                'investment_amount' => 250000.00,
                'notes' => 'Experienced restaurant owner, excellent performance',
                'manager_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Aisha Al-Otaibi',
                'email' => 'aisha.alotaibi@franchise.com',
                'phone' => '+966-555-1002',
                'franchise_location' => 'Westside Mall',
                'start_date' => '2023-03-20',
                'status' => 'active',
                'investment_amount' => 180000.00,
                'notes' => 'First-time franchise owner, showing great potential',
                'manager_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khalid Al-Harbi',
                'email' => 'khalid.alharbi@franchise.com',
                'phone' => '+966-555-1003',
                'franchise_location' => 'North Shopping Center',
                'start_date' => '2022-11-10',
                'status' => 'active',
                'investment_amount' => 320000.00,
                'notes' => 'Multi-unit owner, considering expansion',
                'manager_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('associates')->insert($associates);
    }
}
