<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [
                'title' => 'Welcome to Franchise Management System',
                'message' => 'Your account has been successfully created. Start managing your franchise operations today!',
                'type' => 'success',
                'user_id' => 1,
                'is_read' => false,
                'read_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'New Lead Assignment',
                'message' => 'You have been assigned a new lead: Ahmed Al-Rashid from Al-Rashid Enterprises.',
                'type' => 'info',
                'user_id' => 1,
                'is_read' => false,
                'read_at' => null,
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'title' => 'Monthly Report Due',
                'message' => 'Your monthly franchise performance report is due in 3 days.',
                'type' => 'warning',
                'user_id' => 1,
                'is_read' => false,
                'read_at' => null,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        DB::table('notifications')->insert($notifications);
    }
}
