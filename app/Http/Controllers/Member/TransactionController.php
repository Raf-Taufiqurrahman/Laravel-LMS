<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // get user logged in
        $user = Auth::id();

        // get transaction by user id
        $transactions = Transaction::with('details.series', 'user')->where('user_id', $user)->paginate(10);

        // return to view
        return view('member.transaction.index', compact('transactions'));
    }

    public function show($invoice)
    {
        // get user logged in
        $user = Auth::id();

        // get transaction by user id and invoice
        $transaction = Transaction::with('user')->where('user_id', $user)
        ->where('invoice', $invoice)->first();

        // get all transaction detail by transaction id
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

        // sum grand total from transaction detail
        $grandTotal = $transactionDetails->sum('grand_total');

        // return to view
        return view('member.transaction.show', compact('transaction', 'transactionDetails', 'grandTotal'));
    }
}
