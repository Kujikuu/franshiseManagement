<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $planNames = [
            'Basic', 'Pro', 'Premium', 'Enterprise',
        ];

        $descriptions = [
            'Perfect for small franchise operations with basic management tools',
            'Professional plan for growing franchise networks with advanced features',
            'Premium solution for established franchises with comprehensive tools',
            'Enterprise-grade plan for large franchise networks with full automation',
            'Starter plan for new franchise owners with essential features',
            'Business plan for medium-sized franchise operations',
            'Professional plan with advanced reporting and analytics',
            'Advanced plan with custom integrations and priority support',
            'Elite plan for high-volume franchise operations',
            'Ultimate plan with unlimited features and dedicated support',
            'Standard plan for typical franchise operations',
            'Deluxe plan with premium features and enhanced support'
        ];

        $features = [
            'Basic reporting, User management, Email support',
            'Advanced reporting, Multi-user access, Phone support',
            'Custom reports, API access, Priority support',
            'Full automation, Custom integrations, Dedicated manager',
            'Essential tools, Basic support, Standard features',
            'Business tools, Enhanced support, Advanced features',
            'Professional tools, Priority support, Custom features',
            'Advanced tools, Premium support, API access',
            'Elite tools, Dedicated support, Custom integrations',
            'Unlimited tools, 24/7 support, Full customization',
            'Standard tools, Email support, Basic features',
            'Premium tools, Phone support, Advanced features'
        ];

        $prices = [99, 199, 399, 799, 149, 299, 499, 699, 999, 1499, 199, 399];
        $durations = [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30];
        $maxUsers = [5, 15, 50, 200, 10, 25, 75, 100, 150, 500, 20, 50];
        $maxUnits = [10, 50, 200, 1000, 25, 100, 300, 500, 750, 2000, 50, 150];

        $index = fake()->numberBetween(0, count($planNames) - 1);

        return [
            'name' => $planNames[$index],
            'description' => $descriptions[$index],
            'price' => $prices[$index],
            'duration_days' => $durations[$index],
            'features' => $features[$index],
            'max_users' => $maxUsers[$index],
            'max_units' => $maxUnits[$index],
            'is_active' => fake()->boolean(80),
            'is_popular' => fake()->boolean(20),
            'sort_order' => fake()->numberBetween(1, 100),
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
    public function popular()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => true,
                'is_popular' => true,
            ];
        });
    }
}
