<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Series;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // count all transactions where status false
        $transactionVerified = Transaction::where('status', false)->count();
        // count all users where role is member
        $members = User::with('roles')->role('member')->count();
        // count all series
        $series = Series::count();
        // sum all transaction
        $profits = TransactionDetail::sum('grand_total');

        // get best series with members and author
        $bestSeries= DB::table('transaction_details')
            ->join('series', 'series.id', '=', 'transaction_details.series_id')
            ->join('users', 'users.id', '=', 'series.user_id')
            ->join('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->addSelect(DB::raw('series.name as name, users.name as author, count(transaction_details.series_id) as total'))
            ->groupBy('transaction_details.series_id')
            ->paginate(7);

        // return view
        return view('admin.dashboard', compact('transactionVerified', 'members', 'series', 'profits', 'bestSeries'));
    }
}
