<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Unit;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $tasks = Task::with(['assignedTo', 'createdBy', 'unit'])->get();
        return view('dashboard.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        $users = User::all();
        $units = Unit::all();
        return view('dashboard.tasks.create', compact('users', 'units'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'assigned_to' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'due_date' => 'nullable|date|after:now',
            'notes' => 'nullable|string',
        ]);

        $validated['created_by'] = auth()->id();

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        $task->load(['assignedTo', 'createdBy', 'unit']);
        return view('dashboard.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $units = Unit::all();
        return view('dashboard.tasks.edit', compact('task', 'users', 'units'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'assigned_to' => 'required|exists:users,id',
            'unit_id' => 'nullable|exists:units,id',
            'due_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }

    /**
     * Mark a task as completed.
     */
    public function markCompleted(Task $task)
    {
        $task->markAsCompleted();

        return redirect()->route('tasks.index')
            ->with('success', 'Task marked as completed.');
    }

    /**
     * Get tasks for the authenticated user.
     */
    public function myTasks()
    {
        $tasks = Task::where('assigned_to', auth()->id())
            ->with(['createdBy', 'unit'])
            ->get();
        
        return view('dashboard.tasks.my-tasks', compact('tasks'));
    }
}
