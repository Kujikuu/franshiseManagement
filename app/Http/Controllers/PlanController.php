<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the plans.
     */
    public function index()
    {
        $plans = Plan::ordered()->get();
        return view('dashboard.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new plan.
     */
    public function create()
    {
        return view('dashboard.plans.create');
    }

    /**
     * Store a newly created plan in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'features' => 'nullable|array',
            'max_users' => 'nullable|integer|min:1',
            'max_units' => 'nullable|integer|min:1',
            'is_popular' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = true;
        $validated['features'] = $validated['features'] ?? [];

        Plan::create($validated);

        return redirect()->route('plans.index')
            ->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified plan.
     */
    public function show(Plan $plan)
    {
        $plan->load('users');
        return view('dashboard.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified plan.
     */
    public function edit(Plan $plan)
    {
        return view('dashboard.plans.edit', compact('plan'));
    }

    /**
     * Update the specified plan in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'features' => 'nullable|array',
            'max_users' => 'nullable|integer|min:1',
            'max_units' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
            'is_popular' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['features'] = $validated['features'] ?? [];

        $plan->update($validated);

        return redirect()->route('plans.index')
            ->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified plan from storage.
     */
    public function destroy(Plan $plan)
    {
        // Check if plan has users
        if ($plan->users()->count() > 0) {
            return redirect()->route('plans.index')
                ->with('error', 'Cannot delete plan with active users.');
        }

        $plan->delete();

        return redirect()->route('plans.index')
            ->with('success', 'Plan deleted successfully.');
    }

    /**
     * Toggle plan active status.
     */
    public function toggleActive(Plan $plan)
    {
        $plan->update(['is_active' => !$plan->is_active]);

        $status = $plan->is_active ? 'activated' : 'deactivated';
        return redirect()->route('plans.index')
            ->with('success', "Plan {$status} successfully.");
    }

    /**
     * Toggle plan popular status.
     */
    public function togglePopular(Plan $plan)
    {
        $plan->update(['is_popular' => !$plan->is_popular]);

        $status = $plan->is_popular ? 'marked as popular' : 'unmarked as popular';
        return redirect()->route('plans.index')
            ->with('success', "Plan {$status} successfully.");
    }

    /**
     * Get active plans for subscription.
     */
    public function active()
    {
        $plans = Plan::active()->ordered()->get();
        return view('dashboard.plans.active', compact('plans'));
    }

    /**
     * Get popular plans.
     */
    public function popular()
    {
        $plans = Plan::popular()->active()->ordered()->get();
        return view('dashboard.plans.popular', compact('plans'));
    }
}
