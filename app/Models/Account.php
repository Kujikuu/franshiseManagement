<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'type',
        'balance',
        'bank_name',
        'branch_name',
        'currency',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user for this account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active accounts.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include accounts of a specific type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include accounts with positive balance.
     */
    public function scopeWithBalance($query)
    {
        return $query->where('balance', '>', 0);
    }

    /**
     * Get the type options for accounts.
     */
    public static function getTypeOptions()
    {
        return [
            'checking' => 'Checking',
            'savings' => 'Savings',
            'credit' => 'Credit',
            'investment' => 'Investment',
        ];
    }

    /**
     * Get the currency options for accounts.
     */
    public static function getCurrencyOptions()
    {
        return [
            'USD' => 'US Dollar',
            'EUR' => 'Euro',
            'GBP' => 'British Pound',
            'CAD' => 'Canadian Dollar',
            'AUD' => 'Australian Dollar',
        ];
    }

    /**
     * Add amount to account balance.
     */
    public function addBalance($amount)
    {
        $this->increment('balance', $amount);
    }

    /**
     * Subtract amount from account balance.
     */
    public function subtractBalance($amount)
    {
        $this->decrement('balance', $amount);
    }

    /**
     * Check if account has sufficient balance.
     */
    public function hasSufficientBalance($amount)
    {
        return $this->balance >= $amount;
    }

    /**
     * Get formatted balance with currency.
     */
    public function getFormattedBalance()
    {
        return $this->currency . ' ' . number_format($this->balance, 2);
    }
}
