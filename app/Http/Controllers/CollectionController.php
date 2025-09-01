<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\User;
use App\Models\Unit;

class CollectionController extends Controller
{
    /**
     * Display a listing of the collections.
     */
    public function index()
    {
        $collections = Collection::with(['user', 'unit'])->get();
        return view('dashboard.collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new collection.
     */
    public function create()
    {
        $users = User::all();
        $units = Unit::all();
        $types = Collection::getTypeOptions();
        return view('dashboard.collections.create', compact('users', 'units', 'types'));
    }

    /**
     * Store a newly created collection in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:payment,fee,royalty,penalty',
            'due_date' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';

        Collection::create($validated);

        return redirect()->route('collections.index')
            ->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified collection.
     */
    public function show(Collection $collection)
    {
        $collection->load(['user', 'unit']);
        return view('dashboard.collections.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified collection.
     */
    public function edit(Collection $collection)
    {
        $users = User::all();
        $units = Unit::all();
        $types = Collection::getTypeOptions();
        return view('dashboard.collections.edit', compact('collection', 'users', 'units', 'types'));
    }

    /**
     * Update the specified collection in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:payment,fee,royalty,penalty',
            'status' => 'required|in:pending,paid,cancelled,overdue',
            'due_date' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $collection->update($validated);

        return redirect()->route('collections.index')
            ->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified collection from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('collections.index')
            ->with('success', 'Collection deleted successfully.');
    }

    /**
     * Mark a collection as paid.
     */
    public function markAsPaid(Request $request, Collection $collection)
    {
        $validated = $request->validate([
            'payment_method' => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:255',
        ]);

        $collection->markAsPaid(
            $validated['payment_method'] ?? null,
            $validated['reference_number'] ?? null
        );

        return redirect()->route('collections.index')
            ->with('success', 'Collection marked as paid.');
    }

    /**
     * Show payment form for a collection.
     */
    public function pay(Collection $collection)
    {
        $collection->load(['user', 'unit']);
        return view('dashboard.collections.pay', compact('collection'));
    }

    /**
     * Get overdue collections.
     */
    public function overdue()
    {
        $overdueCollections = Collection::overdue()
            ->with(['user', 'unit'])
            ->get();

        return view('dashboard.collections.overdue', compact('overdueCollections'));
    }

    /**
     * Get collections for a specific user.
     */
    public function userCollections(User $user)
    {
        $collections = Collection::where('user_id', $user->id)
            ->with('unit')
            ->orderBy('due_date', 'desc')
            ->get();

        return view('dashboard.collections.user-collections', compact('user', 'collections'));
    }

    /**
     * Get collections by type.
     */
    public function byType($type)
    {
        $collections = Collection::ofType($type)
            ->with(['user', 'unit'])
            ->get();

        return view('dashboard.collections.by-type', compact('collections', 'type'));
    }
}
