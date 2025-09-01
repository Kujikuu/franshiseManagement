<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $amounts = [5000, 10000, 15000, 20000, 25000, 30000, 50000, 75000, 100000];
        $types = ['payment', 'fee', 'royalty', 'penalty'];
        $statuses = ['pending', 'paid', 'cancelled', 'overdue'];
        $paymentMethods = ['bank_transfer', 'cash', 'check', 'credit_card', 'online_payment'];

        $amount = fake()->randomElement($amounts);
        $status = fake()->randomElement($statuses);
        $dueDate = fake()->dateTimeBetween('-6 months', '+3 months')->format('Y-m-d');
        $paidDate = $status === 'paid' ? fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d') : null;

        return [
            'amount' => $amount,
            'type' => fake()->randomElement($types),
            'status' => $status,
            'due_date' => $dueDate,
            'paid_date' => $paidDate,
            'payment_method' => fake()->randomElement($paymentMethods),
            'reference_number' => fake()->unique()->numerify('REF########'),
            'notes' => fake()->optional(0.6)->sentence(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function paid()
    {
        return $this->state(function (array $attributes) {
            $dueDate = fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d');
            return [
                'status' => 'paid',
                'due_date' => $dueDate,
                'paid_date' => fake()->dateTimeBetween($dueDate, 'now')->format('Y-m-d'),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pending',
                'paid_date' => null,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function overdue()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'overdue',
                'due_date' => fake()->dateTimeBetween('-6 months', '-1 day')->format('Y-m-d'),
                'paid_date' => null,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function royalty()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'royalty',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function highAmount()
    {
        return $this->state(function (array $attributes) {
            return [
                'amount' => fake()->numberBetween(50000, 100000),
            ];
        });
    }
}
