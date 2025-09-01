<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leads = [
            [
                'name' => 'Ahmed Al-Rashid',
                'email' => 'ahmed.alrashid@email.com',
                'phone' => '+966-555-0123',
                'company' => 'Al-Rashid Enterprises',
                'message' => 'Interested in franchise opportunities in downtown area',
                'status' => 'new',
                'source' => 'website',
                'potential_value' => 150000.00,
                'assigned_to' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Fatima Al-Zahra',
                'email' => 'fatima.alzahra@email.com',
                'phone' => '+966-555-0456',
                'company' => 'Al-Zahra Holdings',
                'message' => 'Looking for investment opportunities in food franchise',
                'status' => 'contacted',
                'source' => 'referral',
                'potential_value' => 200000.00,
                'assigned_to' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mohammed Al-Saud',
                'email' => 'mohammed.alsaud@email.com',
                'phone' => '+966-555-0789',
                'company' => 'Al-Saud Investments',
                'message' => 'Interested in multi-unit franchise development',
                'status' => 'qualified',
                'source' => 'trade_show',
                'potential_value' => 500000.00,
                'assigned_to' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('leads')->insert($leads);
    }
}
