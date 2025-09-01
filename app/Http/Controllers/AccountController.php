<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the accounts.
     */
    public function index()
    {
        $accounts = Account::with('user')->get();
        return view('dashboard.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new account.
     */
    public function create()
    {
        $users = User::all();
        $types = Account::getTypeOptions();
        $currencies = Account::getCurrencyOptions();
        return view('dashboard.accounts.create', compact('users', 'types', 'currencies'));
    }

    /**
     * Store a newly created account in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_number' => 'required|string|unique:accounts,account_number',
            'type' => 'required|in:checking,savings,credit,investment',
            'balance' => 'nullable|numeric|min:0',
            'bank_name' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'currency' => 'required|string|size:3',
            'notes' => 'nullable|string',
        ]);

        $validated['is_active'] = true;

        Account::create($validated);

        return redirect()->route('accounts.index')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified account.
     */
    public function show(Account $account)
    {
        $account->load('user');
        return view('dashboard.accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified account.
     */
    public function edit(Account $account)
    {
        $users = User::all();
        $types = Account::getTypeOptions();
        $currencies = Account::getCurrencyOptions();
        return view('dashboard.accounts.edit', compact('account', 'users', 'types', 'currencies'));
    }

    /**
     * Update the specified account in storage.
     */
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_number' => 'required|string|unique:accounts,account_number,' . $account->id,
            'type' => 'required|in:checking,savings,credit,investment',
            'balance' => 'nullable|numeric|min:0',
            'bank_name' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'currency' => 'required|string|size:3',
            'is_active' => 'boolean',
            'notes' => 'nullable|string',
        ]);

        $account->update($validated);

        return redirect()->route('accounts.index')
            ->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified account from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')
            ->with('success', 'Account deleted successfully.');
    }

    /**
     * Add balance to account.
     */
    public function addBalance(Request $request, Account $account)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $account->addBalance($validated['amount']);

        return redirect()->route('accounts.show', $account)
            ->with('success', 'Balance added successfully.');
    }

    /**
     * Subtract balance from account.
     */
    public function subtractBalance(Request $request, Account $account)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        if (!$account->hasSufficientBalance($validated['amount'])) {
            return back()->withErrors(['amount' => 'Insufficient balance.']);
        }

        $account->subtractBalance($validated['amount']);

        return redirect()->route('accounts.show', $account)
            ->with('success', 'Balance subtracted successfully.');
    }

    /**
     * Get accounts for a specific user.
     */
    public function userAccounts(User $user)
    {
        $accounts = Account::where('user_id', $user->id)
            ->orderBy('type')
            ->get();

        return view('dashboard.accounts.user-accounts', compact('user', 'accounts'));
    }
}
