<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration_days',
        'features',
        'max_users',
        'max_units',
        'is_active',
        'is_popular',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
    ];

    /**
     * Get the users for this plan.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Scope a query to only include active plans.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include popular plans.
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    /**
     * Scope a query to order plans by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Get the formatted price.
     */
    public function getFormattedPrice()
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     * Get the duration in months.
     */
    public function getDurationInMonths()
    {
        return round($this->duration_days / 30, 1);
    }

    /**
     * Get the monthly price.
     */
    public function getMonthlyPrice()
    {
        if ($this->duration_days > 0) {
            return round($this->price / ($this->duration_days / 30), 2);
        }
        return $this->price;
    }

    /**
     * Check if plan has a specific feature.
     */
    public function hasFeature($feature)
    {
        return in_array($feature, $this->features ?? []);
    }

    /**
     * Get the features as a formatted list.
     */
    public function getFeaturesList()
    {
        return $this->features ?? [];
    }

    /**
     * Check if plan is suitable for the given number of users.
     */
    public function canSupportUsers($userCount)
    {
        return $this->max_users === null || $userCount <= $this->max_users;
    }

    /**
     * Check if plan is suitable for the given number of units.
     */
    public function canSupportUnits($unitCount)
    {
        return $this->max_units === null || $unitCount <= $this->max_units;
    }
}
