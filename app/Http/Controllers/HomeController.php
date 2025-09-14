<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use App\Models\Unit;
use App\Models\Performance;
use App\Models\Royalty;
use App\Models\Collection;
use App\Models\Task;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function test()
    {
        // Test method
    }

    public function dashboard()
    {
        // Get franchisor data with proper relationships
        $franchisors = User::where('type', 'franchisor')
            ->with(['franchisees', 'franchisorUnits'])
            ->get();

        // Calculate dashboard statistics
        $totalFranchisees = User::where('type', 'franchisee')->count();
        $totalUnits = Unit::count();
        $activeUnits = Unit::where('status', 'active')->count();

        // Calculate total sales from performance data
        $totalSales = Performance::where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->sum('value');

        // Calculate total royalties
        $totalRoyalties = Royalty::where('status', 'paid')
            ->whereYear('paid_date', now()->year)
            ->sum('amount');

        // Get top performing units
        $topUnits = Unit::with(['franchisee', 'franchisor'])
            ->orderBy('revenue', 'desc')
            ->limit(5)
            ->get();

        // Get recent activities
        $recentTasks = \App\Models\Task::with(['assignedTo', 'unit'])
            ->latest()
            ->limit(5)
            ->get();

        $recentCollections = Collection::with(['user', 'unit'])
            ->latest()
            ->limit(5)
            ->get();

        // Prepare data for charts
        $monthlyRevenue = Performance::where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->selectRaw('MONTH(date) as month, SUM(value) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $data = [
            'franchisors' => $franchisors,
            'totalFranchisees' => $totalFranchisees,
            'totalUnits' => $totalUnits,
            'activeUnits' => $activeUnits,
            'totalSales' => $totalSales,
            'totalRoyalties' => $totalRoyalties,
            'topUnits' => $topUnits,
            'recentTasks' => $recentTasks,
            'recentCollections' => $recentCollections,
            'monthlyRevenue' => $monthlyRevenue,
        ];

        return view('dashboard.index', compact('data'));
    }

    public function myfranchise()
    {
        $user = auth()->user();
        
        if ($user->isFranchisee()) {
            // Get franchisee's units
            $units = $user->units()->with(['franchisor'])->get();
            
            // Get franchisee's performance
            $performances = $user->performances()
                ->where('period', 'monthly')
                ->whereYear('date', now()->year)
                ->get();
                
            // Get franchisee's royalties
            $royalties = $user->royalties()
                ->with(['franchisor', 'unit'])
                ->orderBy('due_date', 'desc')
                ->get();
                
            // Get franchisee's tasks
            $tasks = $user->assignedTasks()
                ->with(['createdBy', 'unit'])
                ->latest()
                ->get();
        } else {
            // For franchisors, get their franchisees and units
            $franchisees = $user->franchisees()->with(['units'])->get();
            $units = $user->franchisorUnits()->with(['franchisee'])->get();
            $performances = collect();
            $royalties = collect();
            $tasks = collect();
        }

        return view('dashboard.myfranchise', compact('user', 'units', 'performances', 'royalties', 'tasks'));
    }

    public function performance()
    {
        $user = auth()->user();
        
        if ($user->isFranchisee()) {
            // Get franchisee's performance data
            $performances = $user->performances()
                ->with('unit')
                ->orderBy('date', 'desc')
                ->get();
                
            // Get performance by metric type
            $revenuePerformance = $user->performances()
                ->where('metric_type', 'revenue')
                ->where('period', 'monthly')
                ->whereYear('date', now()->year)
                ->get();
                
            $salesPerformance = $user->performances()
                ->where('metric_type', 'sales')
                ->where('period', 'monthly')
                ->whereYear('date', now()->year)
                ->get();
        } else {
            // For franchisors, get aggregated performance of all their units
            $performances = Performance::whereHas('unit', function($query) use ($user) {
                $query->where('franchisor_id', $user->id);
            })->with(['unit', 'user'])->get();
            
            $revenuePerformance = collect();
            $salesPerformance = collect();
        }

        return view('dashboard.performance', compact('performances', 'revenuePerformance', 'salesPerformance'));
    }

    public function royalty()
    {
        $user = auth()->user();
        
        if ($user->isFranchisee()) {
            // Get franchisee's royalties
            $royalties = $user->royalties()
                ->with(['franchisor', 'unit'])
                ->orderBy('due_date', 'desc')
                ->get();
                
            $pendingRoyalties = $user->royalties()
                ->where('status', 'pending')
                ->with(['franchisor', 'unit'])
                ->get();
                
            $overdueRoyalties = $user->royalties()
                ->overdue()
                ->with(['franchisor', 'unit'])
                ->get();
        } else {
            // For franchisors, get royalties from their franchisees
            $royalties = $user->franchisorRoyalties()
                ->with(['franchisee', 'unit'])
                ->orderBy('due_date', 'desc')
                ->get();
                
            $pendingRoyalties = $user->franchisorRoyalties()
                ->where('status', 'pending')
                ->with(['franchisee', 'unit'])
                ->get();
                
            $overdueRoyalties = $user->franchisorRoyalties()
                ->overdue()
                ->with(['franchisee', 'unit'])
                ->get();
        }

        return view('dashboard.royalty', compact('royalties', 'pendingRoyalties', 'overdueRoyalties'));
    }

    public function tasks()
    {
        $user = auth()->user();
        
        if ($user->isFranchisee()) {
            // Get tasks assigned to franchisee
            $tasks = $user->assignedTasks()
                ->with(['createdBy', 'unit'])
                ->orderBy('due_date', 'asc')
                ->get();
                
            $pendingTasks = $user->assignedTasks()
                ->pending()
                ->with(['createdBy', 'unit'])
                ->get();
                
            $overdueTasks = $user->assignedTasks()
                ->overdue()
                ->with(['createdBy', 'unit'])
                ->get();
        } else {
            // For franchisors, get tasks for their units
            $tasks = Task::whereHas('unit', function($query) use ($user) {
                $query->where('franchisor_id', $user->id);
            })->with(['assignedTo', 'createdBy', 'unit'])->get();
            
            $pendingTasks = collect();
            $overdueTasks = collect();
        }

        return view('dashboard.tasks', compact('tasks', 'pendingTasks', 'overdueTasks'));
    }
}