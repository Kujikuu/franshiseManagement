<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        return view('dashboard.collections.index');
    }

    public function pay($id)
    {
        return view('dashboard.collections.pay', compact('id'));
    }

    public function store(Request $request)
    {
        // Add collection creation logic here
        return redirect()->route('collections')->with('success', 'Collection created successfully');
    }

    public function destroy($id)
    {
        // Add collection deletion logic here
        return redirect()->route('collections')->with('success', 'Collection deleted successfully');
    }
}
