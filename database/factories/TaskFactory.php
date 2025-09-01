<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $titles = [
            'Review franchise application for Riyadh location',
            'Schedule meeting with potential franchisee',
            'Prepare franchise agreement documents',
            'Conduct site inspection for new unit',
            'Update franchise training materials',
            'Review monthly performance reports',
            'Coordinate with suppliers for new unit',
            'Prepare financial projections for franchise',
            'Conduct franchisee training session',
            'Review and approve marketing materials',
            'Schedule maintenance for equipment',
            'Update franchise operations manual',
            'Review compliance documentation',
            'Prepare quarterly business review',
            'Coordinate with legal team for contracts',
            'Schedule franchisee support visit',
            'Review and update pricing strategy',
            'Prepare presentation for investors',
            'Conduct market research for new location',
            'Update franchise disclosure documents'
        ];

        $descriptions = [
            'Review the complete franchise application package and conduct initial assessment',
            'Schedule and prepare for meeting with interested franchise candidate',
            'Prepare and review all necessary franchise agreement documentation',
            'Conduct thorough site inspection and prepare detailed report',
            'Update and improve franchise training materials and procedures',
            'Review monthly performance reports and identify areas for improvement',
            'Coordinate with suppliers to ensure timely delivery for new unit opening',
            'Prepare detailed financial projections and business plan analysis',
            'Conduct comprehensive training session for new franchisee',
            'Review and approve all marketing materials and campaigns',
            'Schedule and coordinate equipment maintenance and repairs',
            'Update franchise operations manual with latest procedures',
            'Review all compliance documentation and ensure regulatory adherence',
            'Prepare comprehensive quarterly business review presentation',
            'Coordinate with legal team to review and finalize contracts',
            'Schedule and conduct franchisee support and training visit',
            'Review and update pricing strategy based on market analysis',
            'Prepare detailed presentation for potential investors',
            'Conduct thorough market research for potential new location',
            'Update franchise disclosure documents with latest information'
        ];

        $statuses = ['pending', 'in_progress', 'completed', 'cancelled'];
        $priorities = ['low', 'medium', 'high', 'urgent'];

        return [
            'title' => fake()->randomElement($titles),
            'description' => fake()->randomElement($descriptions),
            'status' => fake()->randomElement($statuses),
            'priority' => fake()->randomElement($priorities),
            'due_date' => fake()->dateTimeBetween('now', '+30 days'),
            'completed_at' => fake()->optional(0.3)->dateTimeBetween('-30 days', 'now'),
            'notes' => fake()->optional(0.6)->sentence(),
        ];
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
                'completed_at' => null,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'completed',
                'completed_at' => fake()->dateTimeBetween('-30 days', 'now'),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function urgent()
    {
        return $this->state(function (array $attributes) {
            return [
                'priority' => 'urgent',
                'due_date' => fake()->dateTimeBetween('now', '+7 days'),
            ];
        });
    }
}
