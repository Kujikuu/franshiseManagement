<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unit_id',
        'metric_type',
        'value',
        'period',
        'date',
        'target',
        'previous_value',
        'notes',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'target' => 'decimal:2',
        'previous_value' => 'decimal:2',
        'date' => 'date',
    ];

    /**
     * Get the user for this performance record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the unit for this performance record.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Scope a query to only include performances for a specific period.
     */
    public function scopeForPeriod($query, $period)
    {
        return $query->where('period', $period);
    }

    /**
     * Scope a query to only include performances for a specific metric type.
     */
    public function scopeForMetric($query, $metricType)
    {
        return $query->where('metric_type', $metricType);
    }

    /**
     * Scope a query to only include performances for a specific date range.
     */
    public function scopeForDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    /**
     * Get the metric type options for performances.
     */
    public static function getMetricTypeOptions()
    {
        return [
            'sales' => 'Sales',
            'revenue' => 'Revenue',
            'customers' => 'Customers',
            'orders' => 'Orders',
            'profit' => 'Profit',
            'efficiency' => 'Efficiency',
        ];
    }

    /**
     * Get the period options for performances.
     */
    public static function getPeriodOptions()
    {
        return [
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
        ];
    }

    /**
     * Calculate the growth percentage compared to previous value.
     */
    public function getGrowthPercentage()
    {
        if ($this->previous_value > 0) {
            return round((($this->value - $this->previous_value) / $this->previous_value) * 100, 2);
        }
        return 0;
    }

    /**
     * Calculate the achievement percentage against target.
     */
    public function getAchievementPercentage()
    {
        if ($this->target > 0) {
            return round(($this->value / $this->target) * 100, 2);
        }
        return 0;
    }
}
