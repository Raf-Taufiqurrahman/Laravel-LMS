<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Traits\HasSeries;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use HasSeries;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // get transaction by user id
        $transaction = Transaction::where('user_id', Auth::id())->verified()->get();

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userSeries, call from method userSeries, trait hasSeries
            $series = $this->userSeries()->count();
        }else{
            // return back with toastr
            $series = 0;
        }

        return view('member.dashboard', compact('series'));
    }
}
