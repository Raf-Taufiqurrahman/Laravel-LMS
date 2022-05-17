<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Series;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

trait HasSeries
{
    public function userSeries()
    {
        // get user logged in
        $userId = Auth::id();

        // count transaction by user logged in
        $transaction = Transaction::where('user_id', $userId)->count();

        // define variable $series
        $series = null;

        // if transaction is not empty
        if($transaction > 0){
            // get series by user logged in
            $series = TransactionDetail::with('series', 'transaction.user')->whereHas('transaction', function($query) use ($userId){
                $query->where('user_id', $userId);
            });
        }

        // return series
        return $series;
    }

    public function members(Series $series)
    {
        // get all members by series
        $members = TransactionDetail::with('series', 'transaction')->where('series_id', $series->id);

        // return members
        return $members;
    }

    public function bestSeries()
    {
        $bestSeries = DB::table('transaction_details')
                        ->join('series', 'series.id', '=', 'transaction_details.series_id')
                        ->join('users', 'users.id', '=', 'series.user_id')
                        ->join('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
                        ->addSelect(DB::raw('series.name as name, users.name as author, count(transaction_details.series_id) as total'))
                        ->groupBy('transaction_details.series_id')
                        ->paginate(7);

        return $bestSeries;


    }
}
