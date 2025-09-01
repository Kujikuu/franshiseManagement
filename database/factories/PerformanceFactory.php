<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $metricTypes = ['revenue', 'sales', 'customers', 'orders', 'profit', 'efficiency', 'satisfaction'];
        $periods = ['daily', 'weekly', 'monthly', 'quarterly', 'yearly'];
        $targets = [100000, 250000, 500000, 750000, 1000000, 1500000, 2000000];

        $metricType = fake()->randomElement($metricTypes);
        $period = fake()->randomElement($periods);
        $target = fake()->randomElement($targets);
        $value = $target * fake()->randomFloat(2, 0.7, 1.3);
        $previousValue = $value * fake()->randomFloat(2, 0.8, 1.2);

        return [
            'metric_type' => $metricType,
            'value' => $value,
            'period' => $period,
            'date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'target' => $target,
            'previous_value' => $previousValue,
            'notes' => fake()->optional(0.5)->sentence(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function revenue()
    {
        return $this->state(function (array $attributes) {
            $target = fake()->numberBetween(100000, 1000000);
            $value = $target * fake()->randomFloat(2, 0.8, 1.2);
            return [
                'metric_type' => 'revenue',
                'value' => $value,
                'target' => $target,
                'previous_value' => $value * fake()->randomFloat(2, 0.9, 1.1),
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
            $target = fake()->numberBetween(500, 5000);
            $value = $target * fake()->randomFloat(2, 0.8, 1.2);
            return [
                'metric_type' => 'sales',
                'value' => $value,
                'target' => $target,
                'previous_value' => $value * fake()->randomFloat(2, 0.9, 1.1),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function monthly()
    {
        return $this->state(function (array $attributes) {
            return [
                'period' => 'monthly',
                'date' => fake()->dateTimeBetween('-12 months', 'now')->format('Y-m-d'),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function aboveTarget()
    {
        return $this->state(function (array $attributes) {
            $target = fake()->numberBetween(100000, 500000);
            return [
                'value' => $target * fake()->randomFloat(2, 1.1, 1.5),
                'target' => $target,
            ];
        });
    }
}
