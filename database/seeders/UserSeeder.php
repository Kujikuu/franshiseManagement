<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Omar Al-Faisal',
            'email' => 'omar.alfaisal@franchise.com',
            'password' => Hash::make('momomomo'),
            'type' => 'admin'
        ]);

        // Manager Users
        User::create([
            'name' => 'Khalid Al-Mansouri',
            'email' => 'khalid.mansouri@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'franchisor'
        ]);

        User::create([
            'name' => 'Fatima Al-Zahra',
            'email' => 'fatima.zahra@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'franchisee'
        ]);

        // Employee Users
        User::create([
            'name' => 'Ahmed Al-Rashid',
            'email' => 'ahmed.rashid@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'sales'
        ]);

        User::create([
            'name' => 'Aisha Al-Otaibi',
            'email' => 'aisha.otaibi@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'sales'
        ]);

        User::create([
            'name' => 'Mohammed Al-Saud',
            'email' => 'mohammed.saud@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'sales'
        ]);

        User::create([
            'name' => 'Nora Al-Harbi',
            'email' => 'nora.harbi@franchise.com',
            'password' => Hash::make('password123'),
            'type' => 'franchisee'
        ]);
    }
}
