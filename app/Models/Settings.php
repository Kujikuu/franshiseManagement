<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description',
    ];

    protected $casts = [
        'value' => 'json',
    ];

    /**
     * Get a setting value by key.
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function setValue($key, $value, $type = 'string', $group = 'general', $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'description' => $description,
            ]
        );
    }

    /**
     * Scope a query to only include settings of a specific group.
     */
    public function scopeOfGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    /**
     * Scope a query to only include settings of a specific type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the type options for settings.
     */
    public static function getTypeOptions()
    {
        return [
            'string' => 'String',
            'integer' => 'Integer',
            'boolean' => 'Boolean',
            'json' => 'JSON',
        ];
    }

    /**
     * Get the group options for settings.
     */
    public static function getGroupOptions()
    {
        return [
            'general' => 'General',
            'email' => 'Email',
            'payment' => 'Payment',
            'system' => 'System',
            'franchise' => 'Franchise',
        ];
    }
}
