<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // define variables
        $length = 10;
        $random = '';
        // do loop until $i have 10 character
        for($i = 0; $i < $length; $i++){
            // get random character from string and number
            $random .= rand(0,1) ? rand(0,9) : chr(rand(ord('a'), ord('z')));
        }
        // get invoice code
        $invoice = 'INV-'.Str::upper($random);

        // create new transaction
        $transaction = Transaction::create([
            'invoice' => $invoice,
            'name_of_bank' => $request->name_of_bank,
            'user_id' => Auth::id(),
            'bank_transfer' => $request->bank_transfer,
            'method_of_payment' => $request->method_of_payment,
            'date_transfer' => $request->date_transfer,
            'status' => false,
        ]);

        // get cart by user
        $carts = Cart::where('user_id', Auth::id())->get();

        // looping carts
        foreach($carts as $cart){
            // create new transaction detail
            $transaction->details()->create([
                'transaction_id' => $transaction->id,
                'series_id' => $cart->series_id,
                'grand_total' => $cart->price,
            ]);
        }

        // delete all cart by user
        Cart::where('user_id', Auth::id())->delete();

        // return to landing page
        return redirect(route('landing'))->with('success', 'Thank you for your purchase!');
    }
}
