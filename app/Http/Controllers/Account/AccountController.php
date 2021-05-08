<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\Account;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function index()
    {
        return view('account.index');
    }

    public function getAccounts()
    {
        return Account::latest()->paginate(20);
    }

    public function search($query)
    {
        return Account::
            where('account_name', 'LIKE', "%$query%")
            ->orWhere('account_author_number', 'LIKE', "%$query%")
            ->latest()
            ->paginate(10);

    }

    public function getAccountsById($id)
    {
        $transaction = Account::with('transactions')
            ->findOrFail($id);
        return $transaction;
    }

    public function store(AccountRequest $request)
    {

        $api = Account::create(['tenant_id' => session()->get('tenant_id')] + $request->all());
        return $api;
    }


    public function show($id)
    {
        return view('account.show', compact('id'));
    }

    public function download($id, $account_id)
    {
        if ($id === '1') {
            $transaction = Transaction::with('account')
                ->whereRaw('transactions.created_at between date_sub(now(),INTERVAL 1 WEEK) and now()')
                ->where('account_id', $account_id)
                ->get();
        } elseif ($id === '0') {
            $transaction = Transaction::with('account')
                ->where('account_id', $account_id)
                ->get();
        } elseif ($id === '2') {
            $transaction = Transaction::with('account')
                ->whereRaw('transactions.created_at between date_sub(now(),INTERVAL 1 MONTH) and now()')
                ->where('account_id', $account_id)
                ->get();
        } elseif ($id === '3') {
            $transaction = Transaction::with('account')
                ->whereRaw('transactions.created_at between date_sub(now(),INTERVAL 6 MONTH) and now()')
                ->where('account_id', $account_id)
                ->get();
        } else {
            $transaction = Transaction::with('account')
                ->whereRaw('transactions.created_at between date_sub(now(),INTERVAL 1 YEAR) and now()')
                ->where('account_id', $account_id)
                ->get();
        }

        $pdf = PDF::loadView('account.pdf', ['accounts' => $transaction]);
        return $pdf->download('accounts.pdf');

    }


    public function edit($id)
    {

    }

    public function update(AccountUpdateRequest $request, $id)
    {
        $account = Account::findOrFail($id);
        return $account->update($request->all());
    }


    public function destroy($id)
    {
        $customer = Account::findOrFail($id);
        return $customer->delete();
    }
}
