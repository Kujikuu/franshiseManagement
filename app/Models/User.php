<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'brand_name',
        'phone',
        'country',
        'province',
        'city',
        'address',
        'franchisor_id',
        'plan_id',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * Get the franchisor that owns this user.
     */
    public function franchisor()
    {
        return $this->belongsTo(User::class, 'franchisor_id');
    }

    /**
     * Get the franchisees for this franchisor.
     */
    public function franchisees()
    {
        return $this->hasMany(User::class, 'franchisor_id');
    }

    /**
     * Get the plan for this user.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Get the units for this user.
     */
    public function units()
    {
        return $this->hasMany(Unit::class, 'franchisee_id');
    }

    /**
     * Get the units owned by this franchisor.
     */
    public function franchisorUnits()
    {
        return $this->hasMany(Unit::class, 'franchisor_id');
    }

    /**
     * Get the tasks assigned to this user.
     */
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    /**
     * Get the tasks created by this user.
     */
    public function createdTasks()
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    /**
     * Get the technical requests for this user.
     */
    public function technicalRequests()
    {
        return $this->hasMany(TechnicalRequest::class);
    }

    /**
     * Get the technical requests assigned to this user.
     */
    public function assignedTechnicalRequests()
    {
        return $this->hasMany(TechnicalRequest::class, 'assigned_to');
    }

    /**
     * Get the leads assigned to this user.
     */
    public function assignedLeads()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }

    /**
     * Get the performances for this user.
     */
    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    /**
     * Get the royalties for this franchisee.
     */
    public function royalties()
    {
        return $this->hasMany(Royalty::class, 'franchisee_id');
    }

    /**
     * Get the royalties for this franchisor.
     */
    public function franchisorRoyalties()
    {
        return $this->hasMany(Royalty::class, 'franchisor_id');
    }

    /**
     * Get the collections for this user.
     */
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    /**
     * Get the accounts for this user.
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Get the notifications for this user.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Check if user is a franchisor.
     */
    public function isFranchisor()
    {
        return $this->type === 'franchisor';
    }

    /**
     * Check if user is a franchisee.
     */
    public function isFranchisee()
    {
        return $this->type === 'franchisee';
    }

    /**
     * Check if user is an operator.
     */
    public function isOperator()
    {
        return $this->type === 'operator';
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    /**
     * Check if user is active.
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Get the user's full name.
     */
    public function getFullName()
    {
        return $this->name;
    }

    /**
     * Get the user's display name (brand name for franchisors, full name for others).
     */
    public function getDisplayName()
    {
        if ($this->isFranchisor() && $this->brand_name) {
            return $this->brand_name;
        }
        return $this->name;
    }

    /**
     * Get the user's total revenue.
     */
    public function getTotalRevenue()
    {
        return $this->performances()
            ->where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->sum('value');
    }

    /**
     * Get the user's total sales.
     */
    public function getTotalSales()
    {
        return $this->performances()
            ->where('metric_type', 'sales')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->sum('value');
    }

    /**
     * Get the user's total royalties.
     */
    public function getTotalRoyalties()
    {
        return $this->royalties()
            ->where('status', 'paid')
            ->whereYear('paid_date', now()->year)
            ->sum('amount');
    }

    /**
     * Get the user's pending royalties.
     */
    public function getPendingRoyalties()
    {
        return $this->royalties()
            ->where('status', 'pending')
            ->sum('amount');
    }

    /**
     * Get the user's overdue royalties.
     */
    public function getOverdueRoyalties()
    {
        return $this->royalties()
            ->overdue()
            ->sum('amount');
    }

    /**
     * Get the user's plan name.
     */
    public function getPlanName()
    {
        return $this->plan ? $this->plan->name : 'No Plan';
    }

    /**
     * Get the user's last login formatted.
     */
    public function getLastLoginFormatted()
    {
        return $this->last_login ? $this->last_login->format('M d, Y H:i') : 'Never';
    }

    /**
     * Get the user's status badge class.
     */
    public function getStatusBadgeClass()
    {
        return $this->isActive() ? 'badge badge-success' : 'badge badge-danger';
    }

    /**
     * Get the user's type badge class.
     */
    public function getTypeBadgeClass()
    {
        switch ($this->type) {
            case 'franchisor':
                return 'badge badge-primary';
            case 'franchisee':
                return 'badge badge-info';
            case 'operator':
                return 'badge badge-warning';
            case 'admin':
                return 'badge badge-dark';
            default:
                return 'badge badge-secondary';
        }
    }
}
