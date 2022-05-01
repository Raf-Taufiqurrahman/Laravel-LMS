<?php

namespace App\Traits;

use App\Models\Series;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

trait HasSeries
{
    public function userSeries(Series $series)
    {
        // get user with this series
        return Transaction::join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')->where('user_id', Auth::id())->where('transaction_details.series_id', $series->id)
        ->get();
    }

    public function members(Series $series)
    {
        // get all user with this series
        return Transaction::join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')->where('transaction_details.series_id', $series->id)
        ->count();
    }
}
