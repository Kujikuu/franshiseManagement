<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unit_id',
        'amount',
        'type',
        'status',
        'due_date',
        'paid_date',
        'payment_method',
        'reference_number',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    /**
     * Get the user for this collection.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the unit for this collection.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Scope a query to only include pending collections.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include paid collections.
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    /**
     * Scope a query to only include overdue collections.
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())
                    ->where('status', 'pending');
    }

    /**
     * Scope a query to only include collections of a specific type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the type options for collections.
     */
    public static function getTypeOptions()
    {
        return [
            'payment' => 'Payment',
            'fee' => 'Fee',
            'royalty' => 'Royalty',
            'penalty' => 'Penalty',
        ];
    }

    /**
     * Get the status options for collections.
     */
    public static function getStatusOptions()
    {
        return [
            'pending' => 'Pending',
            'paid' => 'Paid',
            'cancelled' => 'Cancelled',
            'overdue' => 'Overdue',
        ];
    }

    /**
     * Check if the collection is overdue.
     */
    public function isOverdue()
    {
        return $this->due_date < now() && $this->status === 'pending';
    }

    /**
     * Mark the collection as paid.
     */
    public function markAsPaid($paymentMethod = null, $referenceNumber = null)
    {
        $this->update([
            'status' => 'paid',
            'paid_date' => now(),
            'payment_method' => $paymentMethod,
            'reference_number' => $referenceNumber,
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
