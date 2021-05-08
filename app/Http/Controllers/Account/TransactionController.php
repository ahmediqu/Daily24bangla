<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function index()
    {
        return view('transaction.index');
    }

    public function accounts()
    {

        return Account::all();
    }
    public function getTransactions()
    {
        return Transaction::with('account')->latest()->paginate(20);
    }

    public function search($query) {

       return Transaction::with('account')->whereHas('account', function($q) use($query){
            $q->where('account_name', 'LIKE', "%$query%");
        })->latest()->paginate(10);
    }

    public function store(TransactionRequest $request)
    {
        DB::transaction(function () use($request){
            $trans = Transaction::create(['tenant_id' => session()->get('tenant_id')]+$request->all());
            $getAccount = $request->account_id;

            $account_balance = Account::findOrFail($getAccount);

            if($request->transactions_type === 'credit') {
                $current_account = $account_balance->balance - $request->transactions;
            }else {
                $current_account = $account_balance->balance + $request->transactions;
            }
            $account_balance->update(['balance' => $current_account]);
            return $trans;
        });
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        return $transaction->update($request->all());
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        return $transaction->delete();
    }

    public function download() {
        $transaction = Transaction::with('account')->get();
        $pdf = PDF::loadView('transaction.pdf', ['accounts' => $transaction]);
        return $pdf->download('accounts.pdf');
    }
}
