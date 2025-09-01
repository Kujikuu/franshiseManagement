<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('dashboard.accounts.index');
    }

    public function store(Request $request)
    {
        // Add account creation logic here
        return redirect()->route('accounts')->with('success', 'Account created successfully');
    }

    public function destroy($id)
    {
        // Add account deletion logic here
        return redirect()->route('accounts')->with('success', 'Account deleted successfully');
    }
}
