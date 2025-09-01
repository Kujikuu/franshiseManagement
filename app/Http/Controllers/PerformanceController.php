<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\User;
use App\Models\Unit;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the performances.
     */
    public function index()
    {
        $performances = Performance::with(['user', 'unit'])->get();
        return view('dashboard.performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new performance record.
     */
    public function create()
    {
        $users = User::all();
        $units = Unit::all();
        $metricTypes = Performance::getMetricTypeOptions();
        $periods = Performance::getPeriodOptions();
        return view('dashboard.performances.create', compact('users', 'units', 'metricTypes', 'periods'));
    }

    /**
     * Store a newly created performance record in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'metric_type' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
            'period' => 'required|in:daily,weekly,monthly,yearly',
            'date' => 'required|date',
            'target' => 'nullable|numeric|min:0',
            'previous_value' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        Performance::create($validated);

        return redirect()->route('performances.index')
            ->with('success', 'Performance record created successfully.');
    }

    /**
     * Display the specified performance record.
     */
    public function show(Performance $performance)
    {
        $performance->load(['user', 'unit']);
        return view('dashboard.performances.show', compact('performance'));
    }

    /**
     * Show the form for editing the specified performance record.
     */
    public function edit(Performance $performance)
    {
        $users = User::all();
        $units = Unit::all();
        $metricTypes = Performance::getMetricTypeOptions();
        $periods = Performance::getPeriodOptions();
        return view('dashboard.performances.edit', compact('performance', 'users', 'units', 'metricTypes', 'periods'));
    }

    /**
     * Update the specified performance record in storage.
     */
    public function update(Request $request, Performance $performance)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'metric_type' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
            'period' => 'required|in:daily,weekly,monthly,yearly',
            'date' => 'required|date',
            'target' => 'nullable|numeric|min:0',
            'previous_value' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $performance->update($validated);

        return redirect()->route('performances.index')
            ->with('success', 'Performance record updated successfully.');
    }

    /**
     * Remove the specified performance record from storage.
     */
    public function destroy(Performance $performance)
    {
        $performance->delete();

        return redirect()->route('performances.index')
            ->with('success', 'Performance record deleted successfully.');
    }

    /**
     * Get performance analytics.
     */
    public function analytics()
    {
        $monthlyRevenue = Performance::where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->whereYear('date', now()->year)
            ->get();

        $topPerformers = Performance::where('metric_type', 'revenue')
            ->where('period', 'monthly')
            ->where('date', now()->startOfMonth())
            ->with('user')
            ->orderBy('value', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.performances.analytics', compact('monthlyRevenue', 'topPerformers'));
    }

    /**
     * Get performance for a specific user.
     */
    public function userPerformance(User $user)
    {
        $performances = Performance::where('user_id', $user->id)
            ->with('unit')
            ->orderBy('date', 'desc')
            ->get();

        return view('dashboard.performances.user-performance', compact('user', 'performances'));
    }
}
