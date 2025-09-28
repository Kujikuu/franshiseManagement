<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Associate;
use App\Models\Collection;
use App\Models\Lead;
use App\Models\Notification;
use App\Models\Performance;
use App\Models\Plan;
use App\Models\Royalty;
use App\Models\Settings;
use App\Models\Task;
use App\Models\TechnicalRequest;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@franloop.sa'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('Yousif1991$$'),
                'brand_name' => 'Franloop',
                'phone' => '+966-11-123-4567',
                'country' => 'Saudi Arabia',
                'province' => 'Riyadh Province',
                'city' => 'Riyadh',
                'address' => 'King Fahd Road, Riyadh',
                'type' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $franchisor = User::firstOrCreate(
            ['email' => 'franchisor@franloop.sa'],
            [
                'name' => 'Franchisor User',
                'password' => Hash::make('Yousif1991$$'),
                'brand_name' => 'Franloop',
                'phone' => '+966-11-123-4567',
                'country' => 'Saudi Arabia',
                'province' => 'Riyadh Province',
                'city' => 'Riyadh',
                'address' => 'King Fahd Road, Riyadh',
                'type' => 'franchisor',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $franchisee = User::firstOrCreate(
            ['email' => 'franchisee@franloop.sa'],
            [
                'name' => 'Franchisee User',
                'password' => Hash::make('Yousif1991$$'),
                'brand_name' => 'Franloop',
                'phone' => '+966-11-123-4567',
                'country' => 'Saudi Arabia',
                'province' => 'Riyadh Province',
                'city' => 'Riyadh',
                'address' => 'King Fahd Road, Riyadh',
                'type' => 'franchisee',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );


        $sales = User::firstOrCreate(
            ['email' => 'sales@franloop.com.sa'],
            [
                'name' => 'Sales User',
                'password' => Hash::make('Yousif1991$$'),
                'brand_name' => 'Franloop',
                'phone' => '+966-11-123-4567',
                'country' => 'Saudi Arabia',
                'province' => 'Riyadh Province',
                'city' => 'Riyadh',
                'address' => 'King Fahd Road, Riyadh',
                'type' => 'sales',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        // Create plans
        $plans = Plan::factory()->count(8)->active()->create();

        // Create franchisors
        $franchisors = User::factory()->franchisor()->count(5)->create([
            'plan_id' => $plans->random()->id,
        ]);

        // Create franchisees for each franchisor
        $franchisees = collect();
        foreach ($franchisors as $franchisor) {
            $franchiseeCount = rand(2, 5);
            $franchiseesForFranchisor = User::factory()->franchisee()->count($franchiseeCount)->create([
                'franchisor_id' => $franchisor->id,
                'plan_id' => $plans->random()->id,
            ]);
            $franchisees = $franchisees->merge($franchiseesForFranchisor);
        }

        // Create sales users
        $salesUsers = User::factory()->sales()->count(10)->create([
            'plan_id' => $plans->random()->id,
        ]);

        // Create units for each franchisor
        foreach ($franchisors as $franchisor) {
            $unitCount = rand(3, 8);
            $franchiseesForFranchisor = $franchisees->where('franchisor_id', $franchisor->id);
            
            for ($i = 0; $i < $unitCount; $i++) {
                $franchisee = $franchiseesForFranchisor->random();
                Unit::factory()->create([
                    'franchisor_id' => $franchisor->id,
                    'franchisee_id' => $franchisee->id,
                ]);
            }
        }

        // Create leads and assign to users
        $allUsers = $franchisors->merge($franchisees)->merge($salesUsers);
        Lead::factory()->count(20)->create([
            'assigned_to' => $allUsers->random()->id,
        ]);

        // Create tasks and assign to users
        Task::factory()->count(30)->create([
            'assigned_to' => $allUsers->random()->id,
            'created_by' => $allUsers->random()->id,
        ]);

        // Create technical requests
        TechnicalRequest::factory()->count(15)->create([
            'user_id' => $allUsers->random()->id,
            'assigned_to' => $salesUsers->random()->id,
        ]);

        // Create associates and assign managers
        Associate::factory()->count(25)->create([
            'manager_id' => $allUsers->random()->id,
        ]);

        // Create accounts for users
        foreach ($allUsers as $user) {
            $accountCount = rand(1, 3);
            Account::factory()->count($accountCount)->create([
                'user_id' => $user->id,
            ]);
        }

        // Create performances for users and units
        $units = Unit::all();
        foreach ($allUsers as $user) {
            $performanceCount = rand(5, 15);
            Performance::factory()->count($performanceCount)->create([
                'user_id' => $user->id,
                'unit_id' => $units->random()->id,
            ]);
        }

        // Create royalties between franchisors and franchisees
        foreach ($franchisors as $franchisor) {
            $franchiseesForFranchisor = $franchisees->where('franchisor_id', $franchisor->id);
            $unitsForFranchisor = $units->where('franchisor_id', $franchisor->id);
            
            foreach ($franchiseesForFranchisor as $franchisee) {
                $royaltyCount = rand(3, 8);
                Royalty::factory()->count($royaltyCount)->create([
                    'franchisor_id' => $franchisor->id,
                    'franchisee_id' => $franchisee->id,
                    'unit_id' => $unitsForFranchisor->random()->id,
                ]);
            }
        }

        // Create collections for users and units
        foreach ($allUsers as $user) {
            $collectionCount = rand(3, 10);
            Collection::factory()->count($collectionCount)->create([
                'user_id' => $user->id,
                'unit_id' => $units->random()->id,
            ]);
        }

        // Create notifications for users
        foreach ($allUsers as $user) {
            $notificationCount = rand(5, 15);
            Notification::factory()->count($notificationCount)->create([
                'user_id' => $user->id,
            ]);
        }

        // Create system settings
        $settingsData = [
            'app_name' => 'Franchise Management System',
            'company_name' => 'Franloop',
            'company_address' => 'King Fahd Road, Riyadh, Saudi Arabia',
            'company_phone' => '+966-11-123-4567',
            'company_email' => 'info@franloop.com.sa',
            'default_currency' => 'SAR',
            'default_language' => 'en',
            'timezone' => 'Asia/Riyadh',
            'date_format' => 'Y-m-d',
            'time_format' => 'H:i:s',
            'royalty_percentage' => '5.0',
            'payment_terms' => '30',
            'notification_email' => 'notifications@franloop.com.sa',
            'support_email' => 'support@franloop.com.sa',
            'max_file_size' => '10485760',
            'allowed_file_types' => 'jpg,jpeg,png,pdf,doc,docx',
            'session_timeout' => '3600',
            'maintenance_mode' => 'false',
            'backup_frequency' => 'daily',
            'auto_logout' => 'true',
        ];

        foreach ($settingsData as $key => $value) {
            Settings::factory()->create([
                'key' => $key,
                'value' => $value,
                'type' => is_numeric($value) ? 'number' : 'string',
                'group' => $this->getSettingsGroup($key),
                'description' => $this->getSettingsDescription($key),
            ]);
        }

        $this->command->info('Database seeded successfully with Saudi Arabian themed data!');
        $this->command->info('Admin user: admin@franloop.com.sa / password');
    }

    /**
     * Get settings group based on key.
     */
    private function getSettingsGroup(string $key): string
    {
        if (str_contains($key, 'company')) {
            return 'company';
        } elseif (str_contains($key, 'app') || str_contains($key, 'default')) {
            return 'application';
        } elseif (str_contains($key, 'royalty') || str_contains($key, 'payment')) {
            return 'financial';
        } elseif (str_contains($key, 'email') || str_contains($key, 'notification')) {
            return 'communication';
        } elseif (str_contains($key, 'file') || str_contains($key, 'backup')) {
            return 'system';
        } else {
            return 'general';
        }
    }

    /**
     * Get settings description based on key.
     */
    private function getSettingsDescription(string $key): string
    {
        $descriptions = [
            'app_name' => 'The name of the application',
            'company_name' => 'The name of the company',
            'company_address' => 'The address of the company',
            'company_phone' => 'The phone number of the company',
            'company_email' => 'The email address of the company',
            'default_currency' => 'The default currency for the system',
            'default_language' => 'The default language for the system',
            'timezone' => 'The timezone for the system',
            'date_format' => 'The date format for the system',
            'time_format' => 'The time format for the system',
            'royalty_percentage' => 'The default royalty percentage',
            'payment_terms' => 'The default payment terms in days',
            'notification_email' => 'The email for system notifications',
            'support_email' => 'The email for support requests',
            'max_file_size' => 'The maximum file size in bytes',
            'allowed_file_types' => 'The allowed file types for uploads',
            'session_timeout' => 'The session timeout in seconds',
            'maintenance_mode' => 'Whether maintenance mode is enabled',
            'backup_frequency' => 'The frequency of system backups',
            'auto_logout' => 'Whether auto logout is enabled',
        ];

        return $descriptions[$key] ?? 'System setting';
    }
}
