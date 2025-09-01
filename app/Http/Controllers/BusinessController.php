<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BusinessController extends Controller
{
    public function index()
    {
        $operators = User::where('role', 'operator')->get();
        return view('dashboard.operators.index', compact('operators'));
    }

    public function show($id)
    {
        $operator = User::findOrFail($id);
        return view('dashboard.operators.show', compact('operator'));
    }

    public function destroy($id)
    {
        $operator = User::findOrFail($id);
        $operator->delete();
        
        return redirect()->route('operators')->with('success', 'Operator deleted successfully');
    }
}
