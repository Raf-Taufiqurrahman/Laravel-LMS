<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all transactions
        $transactions = Transaction::with('details')->search('status')->latest()->paginate(10);
        // return view
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // update transaction
        $transaction->update([
            'status' => 1
        ]);

        // return back with toastr
        return back()->with('toast_success', 'Transaction has been verified');
    }
}
