<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $saudiNames = [
            'Ahmed Al-Rashid', 'Fatima Al-Zahra', 'Mohammed Al-Saud', 'Aisha Al-Qahtani',
            'Abdullah Al-Otaibi', 'Noor Al-Harbi', 'Khalid Al-Ghamdi', 'Layla Al-Mutairi',
            'Omar Al-Shammari', 'Huda Al-Dossary', 'Yousef Al-Balawi', 'Rania Al-Hamdan',
            'Ibrahim Al-Shehri', 'Dana Al-Juhani', 'Hassan Al-Malki', 'Sara Al-Rashidi',
            'Ali Al-Zahrani', 'Nada Al-Sulaiman', 'Tariq Al-Harbi', 'Amina Al-Qarni',
            'Saleh Al-Mutairi', 'Reem Al-Dossary', 'Waleed Al-Ghamdi', 'Lina Al-Otaibi',
            'Fahad Al-Shehri', 'Hanan Al-Malki', 'Majed Al-Rashidi', 'Yasmin Al-Zahrani'
        ];

        $saudiCities = [
            'Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina', 'Taif', 'Tabuk',
            'Abha', 'Jizan', 'Najran', 'Al-Khobar', 'Dhahran', 'Al-Ahsa',
            'Al-Qassim', 'Al-Jouf', 'Hail', 'Al-Baha', 'Al-Qunfudhah'
        ];

        $saudiProvinces = [
            'Riyadh Province', 'Makkah Province', 'Eastern Province', 'Asir Province',
            'Al-Qassim Province', 'Hail Province', 'Tabuk Province', 'Northern Borders Province',
            'Jazan Province', 'Najran Province', 'Al-Bahah Province', 'Al-Jouf Province'
        ];

        $saudiAddresses = [
            'King Fahd Road, Riyadh', 'Tahlia Street, Jeddah', 'King Abdullah Road, Dammam',
            'Al-Madinah Al-Munawwarah Road, Mecca', 'King Faisal Road, Medina',
            'Al-Hada Road, Taif', 'King Abdulaziz Road, Tabuk', 'Abha Ring Road, Abha',
            'Prince Mohammed Street, Jizan', 'King Khalid Road, Najran',
            'Al-Khobar Corniche, Al-Khobar', 'King Fahd University Road, Dhahran',
            'Al-Ahsa Oasis Road, Al-Ahsa', 'King Abdullah Road, Buraydah',
            'Al-Jouf Road, Sakakah', 'King Khalid Road, Hail', 'Al-Baha Mountain Road, Al-Baha'
        ];

        $brandNames = [
            'Al-Nahda Restaurants', 'Golden Sands Hospitality', 'Desert Rose Retail',
            'Arabian Nights Entertainment', 'Saudi Star Services', 'Crown Plaza Hotels',
            'Royal Palm Restaurants', 'Silver Moon Retail', 'Diamond Coast Services',
            'Emerald Valley Hospitality', 'Pearl Gulf Restaurants', 'Crystal Palace Hotels',
            'Golden Gate Retail', 'Silver Star Services', 'Royal Crown Hospitality'
        ];

        $types = ['franchisor', 'franchisee', 'sales', 'admin'];
        $statuses = ['active', 'inactive', 'pending', 'suspended'];

        return [
            'name' => fake()->randomElement($saudiNames),
            'brand_name' => fake()->randomElement($brandNames),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+966' . fake()->numberBetween(500000000, 599999999),
            'country' => 'Saudi Arabia',
            'province' => fake()->randomElement($saudiProvinces),
            'city' => fake()->randomElement($saudiCities),
            'address' => fake()->randomElement($saudiAddresses),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'type' => fake()->randomElement($types),
            'status' => fake()->randomElement($statuses),
            'last_login' => fake()->dateTimeBetween('-30 days', 'now'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function franchisor()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'franchisor',
                'status' => 'active',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function franchisee()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'franchisee',
                'status' => 'active',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function sales()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'sales',
                'status' => 'active',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'admin',
                'status' => 'active',
            ];
        });
    }
}
