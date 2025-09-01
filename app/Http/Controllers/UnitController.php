<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;

class UnitController extends Controller
{
    /**
     * Display a listing of the units.
     */
    public function index()
    {
        $units = Unit::with(['franchisee', 'franchisor'])->get();
        return view('dashboard.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new unit.
     */
    public function create()
    {
        $franchisees = User::where('type', 'franchisee')->get();
        $franchisors = User::where('type', 'franchisor')->get();
        return view('dashboard.units.create', compact('franchisees', 'franchisors'));
    }

    /**
     * Store a newly created unit in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,pending,suspended',
            'franchisee_id' => 'required|exists:users,id',
            'franchisor_id' => 'required|exists:users,id',
            'revenue' => 'nullable|numeric|min:0',
            'monthly_target' => 'nullable|numeric|min:0',
            'opening_date' => 'nullable|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        Unit::create($validated);

        return redirect()->route('units.index')
            ->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified unit.
     */
    public function show(Unit $unit)
    {
        $unit->load(['franchisee', 'franchisor', 'tasks', 'performances']);
        return view('dashboard.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified unit.
     */
    public function edit(Unit $unit)
    {
        $franchisees = User::where('type', 'franchisee')->get();
        $franchisors = User::where('type', 'franchisor')->get();
        return view('dashboard.units.edit', compact('unit', 'franchisees', 'franchisors'));
    }

    /**
     * Update the specified unit in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,pending,suspended',
            'franchisee_id' => 'required|exists:users,id',
            'franchisor_id' => 'required|exists:users,id',
            'revenue' => 'nullable|numeric|min:0',
            'monthly_target' => 'nullable|numeric|min:0',
            'opening_date' => 'nullable|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        $unit->update($validated);

        return redirect()->route('units.index')
            ->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified unit from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit deleted successfully.');
    }
}
