<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('dashboard.plans.index');
    }

    public function store(Request $request)
    {
        // Add plan creation logic here
        return redirect()->route('plans')->with('success', 'Plan created successfully');
    }

    public function destroy($id)
    {
        // Add plan deletion logic here
        return redirect()->route('plans')->with('success', 'Plan deleted successfully');
    }
}
