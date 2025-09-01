<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $titles = [
            'New franchise application received',
            'Monthly royalty payment due',
            'Performance report available',
            'System maintenance scheduled',
            'New lead assigned to you',
            'Task deadline approaching',
            'Technical support request updated',
            'Account balance low',
            'New unit opening soon',
            'Training session scheduled',
            'Compliance review required',
            'Payment received successfully',
            'System update completed',
            'New feature available',
            'Security alert - login from new device',
            'Backup completed successfully',
            'Report generation failed',
            'Integration error detected',
            'User access granted',
            'Document approval required'
        ];

        $messages = [
            'A new franchise application has been submitted and requires your review.',
            'Monthly royalty payment is due within the next 7 days.',
            'Your monthly performance report is now available for review.',
            'System maintenance is scheduled for tonight at 2:00 AM.',
            'A new lead has been assigned to you and requires immediate attention.',
            'You have a task deadline approaching within the next 24 hours.',
            'Your technical support request has been updated with new information.',
            'Your account balance is running low. Please add funds soon.',
            'A new franchise unit is scheduled to open next month.',
            'A training session has been scheduled for next week.',
            'Annual compliance review is required. Please complete by month end.',
            'Payment of SAR 25,000 has been received successfully.',
            'System update has been completed successfully.',
            'New feature "Advanced Reporting" is now available.',
            'Login detected from a new device. Please verify if this was you.',
            'Daily backup has been completed successfully.',
            'Report generation failed due to insufficient data.',
            'Integration error detected with payment gateway.',
            'User access has been granted for new franchisee.',
            'Document approval is required for franchise agreement.'
        ];

        $types = ['info', 'success', 'warning', 'error'];
        $isRead = fake()->boolean(30);

        return [
            'title' => fake()->randomElement($titles),
            'message' => fake()->randomElement($messages),
            'type' => fake()->randomElement($types),
            'is_read' => $isRead,
            'read_at' => $isRead ? fake()->dateTimeBetween('-30 days', 'now') : null,
            'data' => json_encode([
                'action_url' => fake()->optional(0.7)->url(),
                'priority' => fake()->randomElement(['low', 'medium', 'high']),
                'category' => fake()->randomElement(['system', 'business', 'financial', 'operational']),
            ]),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function unread()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_read' => false,
                'read_at' => null,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function read()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_read' => true,
                'read_at' => fake()->dateTimeBetween('-30 days', 'now'),
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
                'type' => 'error',
                'data' => json_encode([
                    'action_url' => fake()->url(),
                    'priority' => 'high',
                    'category' => 'business',
                ]),
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function financial()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'warning',
                'data' => json_encode([
                    'action_url' => fake()->url(),
                    'priority' => 'medium',
                    'category' => 'financial',
                ]),
            ];
        });
    }
}
