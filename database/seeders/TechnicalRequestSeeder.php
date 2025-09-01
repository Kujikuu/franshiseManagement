<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TechnicalRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicalRequests = [
            [
                'title' => 'POS System Integration',
                'description' => 'Need to integrate new POS system with existing inventory management software.',
                'priority' => 'high',
                'status' => 'pending',
                'category' => 'software',
                'user_id' => 1,
                'assigned_to' => null,
                'due_date' => Carbon::now()->addDays(7),
                'completed_at' => null,
                'resolution_notes' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Network Connectivity Issues',
                'description' => 'Intermittent network connectivity issues affecting customer transactions.',
                'priority' => 'urgent',
                'status' => 'in_progress',
                'category' => 'network',
                'user_id' => 1,
                'assigned_to' => 1,
                'due_date' => Carbon::now()->addDays(2),
                'completed_at' => null,
                'resolution_notes' => 'Investigating router configuration issues',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subHours(3),
            ],
            [
                'title' => 'Security Camera Maintenance',
                'description' => 'Regular maintenance and software update for security camera system.',
                'priority' => 'medium',
                'status' => 'completed',
                'category' => 'hardware',
                'user_id' => 1,
                'assigned_to' => 1,
                'due_date' => Carbon::now()->subDays(2),
                'completed_at' => Carbon::now()->subDays(1),
                'resolution_notes' => 'All cameras updated and functioning properly',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        DB::table('technical_requests')->insert($technicalRequests);
    }
}
