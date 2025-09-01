<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $saudiBanks = [
            'Al Rajhi Bank', 'Saudi National Bank', 'Riyad Bank', 'Arab National Bank',
            'Saudi British Bank (SABB)', 'Bank Aljazira', 'Bank Albilad', 'Saudi Investment Bank',
            'Alinma Bank', 'Saudi French Bank (BSFR)', 'Gulf International Bank', 'Bank Alkhair',
            'Saudi Hollandi Bank', 'Arab Bank', 'Emirates NBD', 'Qatar National Bank'
        ];

        $branchNames = [
            'Riyadh Main Branch', 'Jeddah Central Branch', 'Dammam Business Branch',
            'Mecca Holy Branch', 'Medina Prophet Branch', 'Taif Mountain Branch',
            'Tabuk Northern Branch', 'Abha Southern Branch', 'Jizan Coastal Branch',
            'Najran Border Branch', 'Al-Khobar Eastern Branch', 'Dhahran University Branch',
            'Al-Ahsa Oasis Branch', 'Buraydah Central Branch', 'Sakakah Northern Branch',
            'Hail Central Branch', 'Al-Baha Mountain Branch', 'Al-Qunfudhah Coastal Branch'
        ];

        $accountTypes = ['checking', 'savings', 'credit', 'investment'];
        $currencies = ['SAR', 'USD', 'EUR', 'GBP'];
        $balances = [10000, 25000, 50000, 100000, 250000, 500000, 1000000, 2500000];

        return [
            'account_number' => fake()->unique()->numerify('SA##########'),
            'type' => fake()->randomElement($accountTypes),
            'balance' => fake()->randomElement($balances),
            'bank_name' => fake()->randomElement($saudiBanks),
            'branch_name' => fake()->randomElement($branchNames),
            'currency' => fake()->randomElement($currencies),
            'is_active' => fake()->boolean(85),
            'notes' => fake()->optional(0.6)->sentence(),
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
                'is_active' => true,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function highBalance()
    {
        return $this->state(function (array $attributes) {
            return [
                'balance' => fake()->numberBetween(500000, 2500000),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function credit()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'credit',
            ];
        });
    }
}
