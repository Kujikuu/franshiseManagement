<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unitNames = [
            'Al-Nahda Riyadh Branch', 'Golden Sands Jeddah', 'Desert Rose Dammam', 'Arabian Nights Mecca',
            'Saudi Star Medina', 'Crown Plaza Taif', 'Royal Palm Tabuk', 'Silver Moon Abha',
            'Diamond Coast Jizan', 'Emerald Valley Najran', 'Pearl Gulf Al-Khobar', 'Crystal Palace Dhahran',
            'Al-Ahsa Oasis Branch', 'Al-Qassim Center', 'Al-Jouf Plaza', 'Hail Mall Branch',
            'Al-Baha Mountain', 'Al-Qunfudhah Coast', 'King Fahd Road Branch', 'Tahlia Street Branch',
            'King Abdullah Branch', 'Al-Madinah Branch', 'King Faisal Branch', 'Al-Hada Branch'
        ];

        $saudiLocations = [
            'Riyadh', 'Jeddah', 'Dammam', 'Mecca', 'Medina', 'Taif', 'Tabuk',
            'Abha', 'Jizan', 'Najran', 'Al-Khobar', 'Dhahran', 'Al-Ahsa',
            'Buraydah', 'Sakakah', 'Hail', 'Al-Baha', 'Al-Qunfudhah'
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

        $statuses = ['active', 'inactive', 'pending', 'suspended'];
        $revenue = fake()->numberBetween(50000, 500000);
        $monthlyTarget = $revenue * fake()->randomFloat(2, 0.8, 1.2);

        return [
            'name' => fake()->randomElement($unitNames),
            'location' => fake()->randomElement($saudiLocations),
            'status' => fake()->randomElement($statuses),
            'revenue' => $revenue,
            'monthly_target' => $monthlyTarget,
            'opening_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'address' => fake()->randomElement($saudiAddresses),
            'phone' => '+966' . fake()->numberBetween(500000000, 599999999),
            'email' => fake()->unique()->safeEmail(),
            'notes' => fake()->optional(0.7)->sentence(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'active',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function highRevenue()
    {
        return $this->state(function (array $attributes) {
            $revenue = fake()->numberBetween(300000, 500000);
            return [
                'revenue' => $revenue,
                'monthly_target' => $revenue * fake()->randomFloat(2, 0.9, 1.1),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function recentlyOpened()
    {
        return $this->state(function (array $attributes) {
            return [
                'opening_date' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'status' => 'active',
            ];
        });
    }
}
