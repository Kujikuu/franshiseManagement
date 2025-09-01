<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TechnicalRequest>
 */
class TechnicalRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $titles = [
            'POS system malfunction at Riyadh branch',
            'Network connectivity issues in Jeddah unit',
            'Software update required for franchise management system',
            'Hardware replacement needed for Dammam location',
            'Database backup and recovery assistance',
            'User access permissions configuration',
            'System integration with third-party services',
            'Mobile app synchronization problems',
            'Reporting module performance optimization',
            'Security audit and vulnerability assessment',
            'Data migration assistance for new unit',
            'API integration with payment gateway',
            'Email system configuration issues',
            'Backup system verification and testing',
            'Software license renewal and activation',
            'System monitoring and alert setup',
            'Database optimization and maintenance',
            'User training for new software features',
            'System backup and disaster recovery planning',
            'Performance monitoring and optimization'
        ];

        $descriptions = [
            'POS system is experiencing frequent crashes and slow response times',
            'Network connectivity is intermittent and affecting daily operations',
            'Software update is required to fix security vulnerabilities and bugs',
            'Hardware components need replacement due to wear and tear',
            'Database backup and recovery procedures need to be implemented',
            'User access permissions need to be configured for new staff members',
            'System integration with third-party services is not working properly',
            'Mobile app is not synchronizing data with the main system',
            'Reporting module is running slowly and needs optimization',
            'Security audit is required to identify and fix vulnerabilities',
            'Data migration assistance is needed for the new franchise unit',
            'API integration with payment gateway is failing intermittently',
            'Email system configuration needs to be updated for new domain',
            'Backup system needs verification and testing to ensure reliability',
            'Software license renewal and activation process is not working',
            'System monitoring and alert setup is required for proactive maintenance',
            'Database optimization and maintenance is needed to improve performance',
            'User training is required for new software features and updates',
            'System backup and disaster recovery planning needs to be implemented',
            'Performance monitoring and optimization is required for better efficiency'
        ];

        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses = ['pending', 'in_progress', 'completed', 'cancelled'];
        $categories = ['hardware', 'software', 'network', 'security', 'other'];

        return [
            'title' => fake()->randomElement($titles),
            'description' => fake()->randomElement($descriptions),
            'priority' => fake()->randomElement($priorities),
            'status' => fake()->randomElement($statuses),
            'category' => fake()->randomElement($categories),
            'due_date' => fake()->dateTimeBetween('now', '+14 days'),
            'completed_at' => fake()->optional(0.4)->dateTimeBetween('-30 days', 'now'),
            'resolution_notes' => fake()->optional(0.5)->sentence(),
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
    public function urgent()
    {
        return $this->state(function (array $attributes) {
            return [
                'priority' => 'urgent',
                'due_date' => fake()->dateTimeBetween('now', '+2 days'),
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
                'resolution_notes' => fake()->sentence(),
            ];
        });
    }
}
