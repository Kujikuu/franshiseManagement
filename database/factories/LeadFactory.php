<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
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

        $saudiCompanies = [
            'Al-Rashid Trading Co.', 'Golden Sands Investments', 'Desert Rose Holdings',
            'Arabian Nights Group', 'Saudi Star Enterprises', 'Crown Plaza Investments',
            'Royal Palm Trading', 'Silver Moon Holdings', 'Diamond Coast Group',
            'Emerald Valley Enterprises', 'Pearl Gulf Investments', 'Crystal Palace Trading',
            'Al-Nahda Holdings', 'Al-Zahra Group', 'Al-Saud Enterprises', 'Al-Qahtani Trading'
        ];

        $messages = [
            'Interested in opening a franchise in Riyadh area',
            'Looking for franchise opportunities in Jeddah',
            'Want to discuss franchise investment options',
            'Seeking information about franchise requirements',
            'Interested in restaurant franchise opportunities',
            'Looking for retail franchise options',
            'Want to invest in hospitality franchise',
            'Seeking franchise opportunities in Eastern Province',
            'Interested in opening multiple franchise locations',
            'Looking for franchise support and training',
            'Want to discuss franchise financing options',
            'Seeking franchise opportunities in major cities'
        ];

        $statuses = ['new', 'contacted', 'qualified', 'converted', 'lost'];
        $sources = ['website', 'referral', 'social_media', 'advertisement', 'cold_call', 'event', 'direct_mail'];
        $potentialValues = [50000, 100000, 150000, 200000, 250000, 300000, 500000, 750000, 1000000];

        return [
            'name' => fake()->randomElement($saudiNames),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+966' . fake()->numberBetween(500000000, 599999999),
            'company' => fake()->randomElement($saudiCompanies),
            'message' => fake()->randomElement($messages),
            'status' => fake()->randomElement($statuses),
            'source' => fake()->randomElement($sources),
            'potential_value' => fake()->randomElement($potentialValues),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function fresh()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'new',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function qualified()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'qualified',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function highValue()
    {
        return $this->state(function (array $attributes) {
            return [
                'potential_value' => fake()->numberBetween(500000, 1000000),
            ];
        });
    }
}
