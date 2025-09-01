<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Royalty;
use App\Models\User;
use App\Models\Unit;

class RoyaltyController extends Controller
{
    /**
     * Display a listing of the royalties.
     */
    public function index()
    {
        $royalties = Royalty::with(['franchisee', 'franchisor', 'unit'])->get();
        return view('dashboard.royalties.index', compact('royalties'));
    }

    /**
     * Show the form for creating a new royalty.
     */
    public function create()
    {
        $franchisees = User::where('type', 'franchisee')->get();
        $franchisors = User::where('type', 'franchisor')->get();
        $units = Unit::all();
        $periods = Royalty::getPeriodOptions();
        return view('dashboard.royalties.create', compact('franchisees', 'franchisors', 'units', 'periods'));
    }

    /**
     * Store a newly created royalty in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchisee_id' => 'required|exists:users,id',
            'franchisor_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'amount' => 'required|numeric|min:0',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|in:pending,paid,overdue,cancelled',
            'due_date' => 'required|date',
            'period' => 'required|in:monthly,quarterly,yearly',
            'notes' => 'nullable|string',
        ]);

        Royalty::create($validated);

        return redirect()->route('royalties.index')
            ->with('success', 'Royalty created successfully.');
    }

    /**
     * Display the specified royalty.
     */
    public function show(Royalty $royalty)
    {
        $royalty->load(['franchisee', 'franchisor', 'unit']);
        return view('dashboard.royalties.show', compact('royalty'));
    }

    /**
     * Show the form for editing the specified royalty.
     */
    public function edit(Royalty $royalty)
    {
        $franchisees = User::where('type', 'franchisee')->get();
        $franchisors = User::where('type', 'franchisor')->get();
        $units = Unit::all();
        $periods = Royalty::getPeriodOptions();
        return view('dashboard.royalties.edit', compact('royalty', 'franchisees', 'franchisors', 'units', 'periods'));
    }

    /**
     * Update the specified royalty in storage.
     */
    public function update(Request $request, Royalty $royalty)
    {
        $validated = $request->validate([
            'franchisee_id' => 'required|exists:users,id',
            'franchisor_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'amount' => 'required|numeric|min:0',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'status' => 'required|in:pending,paid,overdue,cancelled',
            'due_date' => 'required|date',
            'period' => 'required|in:monthly,quarterly,yearly',
            'notes' => 'nullable|string',
        ]);

        $royalty->update($validated);

        return redirect()->route('royalties.index')
            ->with('success', 'Royalty updated successfully.');
    }

    /**
     * Remove the specified royalty from storage.
     */
    public function destroy(Royalty $royalty)
    {
        $royalty->delete();

        return redirect()->route('royalties.index')
            ->with('success', 'Royalty deleted successfully.');
    }

    /**
     * Mark a royalty as paid.
     */
    public function markAsPaid(Royalty $royalty)
    {
        $royalty->markAsPaid();

        return redirect()->route('royalties.index')
            ->with('success', 'Royalty marked as paid.');
    }

    /**
     * Get overdue royalties.
     */
    public function overdue()
    {
        $overdueRoyalties = Royalty::overdue()
            ->with(['franchisee', 'franchisor', 'unit'])
            ->get();

        return view('dashboard.royalties.overdue', compact('overdueRoyalties'));
    }

    /**
     * Get royalties for a specific franchisee.
     */
    public function franchiseeRoyalties(User $franchisee)
    {
        $royalties = Royalty::where('franchisee_id', $franchisee->id)
            ->with(['franchisor', 'unit'])
            ->orderBy('due_date', 'desc')
            ->get();

        return view('dashboard.royalties.franchisee-royalties', compact('franchisee', 'royalties'));
    }

    /**
     * Calculate royalties for a period.
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'franchisee_id' => 'required|exists:users,id',
            'period' => 'required|in:monthly,quarterly,yearly',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        // This would contain the logic to calculate royalties based on performance
        // For now, we'll just return a success message
        return redirect()->route('royalties.index')
            ->with('success', 'Royalty calculation completed.');
    }
}
