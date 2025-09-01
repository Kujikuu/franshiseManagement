<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Associate>
 */
class AssociateFactory extends Factory
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
            'Ali Al-Zahrani', 'Nada Al-Sulaiman', 'Tariq Al-Harbi', 'Amina Al-Qarni'
        ];

        $franchiseLocations = [
            'Riyadh - King Fahd Road', 'Jeddah - Tahlia Street', 'Dammam - King Abdullah Road',
            'Mecca - Al-Madinah Road', 'Medina - King Faisal Road', 'Taif - Al-Hada Road',
            'Tabuk - King Abdulaziz Road', 'Abha - Ring Road', 'Jizan - Prince Mohammed Street',
            'Najran - King Khalid Road', 'Al-Khobar - Corniche', 'Dhahran - University Road',
            'Al-Ahsa - Oasis Road', 'Buraydah - King Abdullah Road', 'Sakakah - Al-Jouf Road',
            'Hail - King Khalid Road', 'Al-Baha - Mountain Road', 'Al-Qunfudhah - Coast Road'
        ];

        $statuses = ['active', 'inactive', 'suspended'];
        $investmentAmounts = [50000, 100000, 150000, 200000, 250000, 300000, 500000, 750000, 1000000];

        return [
            'name' => fake()->randomElement($saudiNames),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+966' . fake()->numberBetween(500000000, 599999999),
            'franchise_location' => fake()->randomElement($franchiseLocations),
            'start_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'status' => fake()->randomElement($statuses),
            'investment_amount' => fake()->randomElement($investmentAmounts),
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
    public function highInvestment()
    {
        return $this->state(function (array $attributes) {
            return [
                'investment_amount' => fake()->numberBetween(500000, 1000000),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function recent()
    {
        return $this->state(function (array $attributes) {
            return [
                'start_date' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'status' => 'active',
            ];
        });
    }
}
