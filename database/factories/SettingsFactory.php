<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $settings = [
            'app_name' => 'Franchise Management System',
            'company_name' => 'Franloop',
            'company_address' => 'King Fahd Road, Riyadh, Saudi Arabia',
            'company_phone' => '+966-11-123-4567',
            'company_email' => 'info@franloop.com.sa',
            'default_currency' => 'SAR',
            'default_language' => 'en',
            'timezone' => 'Asia/Riyadh',
            'date_format' => 'Y-m-d',
            'time_format' => 'H:i:s',
            'royalty_percentage' => '5.0',
            'payment_terms' => '30',
            'notification_email' => 'notifications@franloop.com.sa',
            'support_email' => 'support@franloop.com.sa',
            'max_file_size' => '10485760',
            'allowed_file_types' => 'jpg,jpeg,png,pdf,doc,docx',
            'session_timeout' => '3600',
            'maintenance_mode' => 'false',
            'backup_frequency' => 'daily',
            'auto_logout' => 'true',
        ];

        $key = fake()->randomElement(array_keys($settings));
        $value = $settings[$key];
        $type = $this->getTypeFromValue($value);
        $group = $this->getGroupFromKey($key);

        return [
            'key' => $key,
            'value' => $value,
            'type' => $type,
            'group' => $group,
            'description' => $this->getDescriptionFromKey($key),
        ];
    }

    /**
     * Get the type from the value.
     */
    private function getTypeFromValue($value)
    {
        if (is_numeric($value)) {
            return 'number';
        } elseif (in_array($value, ['true', 'false'])) {
            return 'boolean';
        } else {
            return 'string';
        }
    }

    /**
     * Get the group from the key.
     */
    private function getGroupFromKey($key)
    {
        if (str_contains($key, 'company')) {
            return 'company';
        } elseif (str_contains($key, 'app') || str_contains($key, 'default')) {
            return 'application';
        } elseif (str_contains($key, 'royalty') || str_contains($key, 'payment')) {
            return 'financial';
        } elseif (str_contains($key, 'email') || str_contains($key, 'notification')) {
            return 'communication';
        } elseif (str_contains($key, 'file') || str_contains($key, 'backup')) {
            return 'system';
        } else {
            return 'general';
        }
    }

    /**
     * Get the description from the key.
     */
    private function getDescriptionFromKey($key)
    {
        $descriptions = [
            'app_name' => 'The name of the application',
            'company_name' => 'The name of the company',
            'company_address' => 'The address of the company',
            'company_phone' => 'The phone number of the company',
            'company_email' => 'The email address of the company',
            'default_currency' => 'The default currency for the system',
            'default_language' => 'The default language for the system',
            'timezone' => 'The timezone for the system',
            'date_format' => 'The date format for the system',
            'time_format' => 'The time format for the system',
            'royalty_percentage' => 'The default royalty percentage',
            'payment_terms' => 'The default payment terms in days',
            'notification_email' => 'The email for system notifications',
            'support_email' => 'The email for support requests',
            'max_file_size' => 'The maximum file size in bytes',
            'allowed_file_types' => 'The allowed file types for uploads',
            'session_timeout' => 'The session timeout in seconds',
            'maintenance_mode' => 'Whether maintenance mode is enabled',
            'backup_frequency' => 'The frequency of system backups',
            'auto_logout' => 'Whether auto logout is enabled',
        ];

        return $descriptions[$key] ?? 'System setting';
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function company()
    {
        return $this->state(function (array $attributes) {
            return [
                'group' => 'company',
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
                'group' => 'financial',
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function system()
    {
        return $this->state(function (array $attributes) {
            return [
                'group' => 'system',
            ];
        });
    }
}
