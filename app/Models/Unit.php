<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'status',
        'franchisee_id',
        'franchisor_id',
        'revenue',
        'monthly_target',
        'opening_date',
        'address',
        'phone',
        'email',
        'notes',
    ];

    protected $casts = [
        'revenue' => 'decimal:2',
        'monthly_target' => 'decimal:2',
        'opening_date' => 'date',
    ];

    /**
     * Get the franchisee for this unit.
     */
    public function franchisee()
    {
        return $this->belongsTo(User::class, 'franchisee_id');
    }

    /**
     * Get the franchisor for this unit.
     */
    public function franchisor()
    {
        return $this->belongsTo(User::class, 'franchisor_id');
    }

    /**
     * Get the tasks for this unit.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the performances for this unit.
     */
    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    /**
     * Get the royalties for this unit.
     */
    public function royalties()
    {
        return $this->hasMany(Royalty::class);
    }

    /**
     * Get the collections for this unit.
     */
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    /**
     * Scope a query to only include active units.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include units with a specific status.
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get the status options for units.
     */
    public static function getStatusOptions()
    {
        return [
            'active' => 'Active',
            'inactive' => 'Inactive',
            'pending' => 'Pending',
            'suspended' => 'Suspended',
        ];
    }

    /**
     * Calculate the performance percentage against monthly target.
     */
    public function getPerformancePercentage()
    {
        if ($this->monthly_target > 0) {
            return round(($this->revenue / $this->monthly_target) * 100, 2);
        }
        return 0;
    }

    /**
     * Get the unit's status badge class.
     */
    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'active':
                return 'badge badge-success';
            case 'inactive':
                return 'badge badge-secondary';
            case 'pending':
                return 'badge badge-warning';
            case 'suspended':
                return 'badge badge-danger';
            default:
                return 'badge badge-secondary';
        }
    }

    /**
     * Get the unit's formatted revenue.
     */
    public function getFormattedRevenue()
    {
        return '$' . number_format($this->revenue, 2);
    }

    /**
     * Get the unit's formatted monthly target.
     */
    public function getFormattedMonthlyTarget()
    {
        return $this->monthly_target ? '$' . number_format($this->monthly_target, 2) : 'Not Set';
    }

    /**
     * Get the unit's formatted opening date.
     */
    public function getFormattedOpeningDate()
    {
        return $this->opening_date ? $this->opening_date->format('M d, Y') : 'Not Set';
    }

    /**
     * Get the unit's total tasks count.
     */
    public function getTotalTasksCount()
    {
        return $this->tasks()->count();
    }

    /**
     * Get the unit's pending tasks count.
     */
    public function getPendingTasksCount()
    {
        return $this->tasks()->pending()->count();
    }

    /**
     * Get the unit's completed tasks count.
     */
    public function getCompletedTasksCount()
    {
        return $this->tasks()->completed()->count();
    }

    /**
     * Get the unit's total royalties.
     */
    public function getTotalRoyalties()
    {
        return $this->royalties()->sum('amount');
    }

    /**
     * Get the unit's pending royalties.
     */
    public function getPendingRoyalties()
    {
        return $this->royalties()->pending()->sum('amount');
    }

    /**
     * Get the unit's overdue royalties.
     */
    public function getOverdueRoyalties()
    {
        return $this->royalties()->overdue()->sum('amount');
    }

    /**
     * Get the unit's total collections.
     */
    public function getTotalCollections()
    {
        return $this->collections()->sum('amount');
    }

    /**
     * Get the unit's pending collections.
     */
    public function getPendingCollections()
    {
        return $this->collections()->pending()->sum('amount');
    }

    /**
     * Get the unit's performance trend (positive/negative).
     */
    public function getPerformanceTrend()
    {
        $currentMonth = $this->performances()
            ->where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->first();

        $lastMonth = $this->performances()
            ->where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->subMonth()->year)
            ->whereMonth('date', now()->subMonth()->month)
            ->first();

        if (!$currentMonth || !$lastMonth) {
            return 'neutral';
        }

        return $currentMonth->value > $lastMonth->value ? 'positive' : 'negative';
    }
}
