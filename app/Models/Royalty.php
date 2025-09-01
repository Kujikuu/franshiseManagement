<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Royalty extends Model
{
    use HasFactory;

    protected $fillable = [
        'franchisee_id',
        'franchisor_id',
        'unit_id',
        'amount',
        'percentage',
        'status',
        'due_date',
        'paid_date',
        'period',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'percentage' => 'decimal:2',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    /**
     * Get the franchisee for this royalty.
     */
    public function franchisee()
    {
        return $this->belongsTo(User::class, 'franchisee_id');
    }

    /**
     * Get the franchisor for this royalty.
     */
    public function franchisor()
    {
        return $this->belongsTo(User::class, 'franchisor_id');
    }

    /**
     * Get the unit for this royalty.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Scope a query to only include pending royalties.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include paid royalties.
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    /**
     * Scope a query to only include overdue royalties.
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())
                    ->where('status', 'pending');
    }

    /**
     * Scope a query to only include royalties for a specific period.
     */
    public function scopeForPeriod($query, $period)
    {
        return $query->where('period', $period);
    }

    /**
     * Get the status options for royalties.
     */
    public static function getStatusOptions()
    {
        return [
            'pending' => 'Pending',
            'paid' => 'Paid',
            'overdue' => 'Overdue',
            'cancelled' => 'Cancelled',
        ];
    }

    /**
     * Get the period options for royalties.
     */
    public static function getPeriodOptions()
    {
        return [
            'monthly' => 'Monthly',
            'quarterly' => 'Quarterly',
            'yearly' => 'Yearly',
        ];
    }

    /**
     * Check if the royalty is overdue.
     */
    public function isOverdue()
    {
        return $this->due_date < now() && $this->status === 'pending';
    }

    /**
     * Mark the royalty as paid.
     */
    public function markAsPaid()
    {
        $this->update([
            'status' => 'paid',
            'paid_date' => now(),
        ]);
    }

    /**
     * Calculate the days overdue.
     */
    public function getDaysOverdue()
    {
        if ($this->isOverdue()) {
            return now()->diffInDays($this->due_date);
        }
        return 0;
    }
}
