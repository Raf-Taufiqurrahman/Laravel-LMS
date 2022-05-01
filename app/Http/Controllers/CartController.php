<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // get cart by user
        $carts = Cart::where('user_id', Auth::id())->latest()->get();

        // sum total price from cart
        $grandTotal = $carts->sum('price');

        // check if cart is not empty
        if($carts->count() > 0){
            // return to cart page
            return view('landing.cart.index', compact('carts', 'grandTotal'));
        }
        // return back
        return back()->with('toast_error', 'Your cart is empty');
    }

    public function store(Series $series)
    {
        // get users
        $user = Auth::user();

        // check if user has already added this series
        $alreadyInCart = Cart::where('user_id', $user->id)->where('series_id', $series->id)->first();

        // if user has already added this series
        if($alreadyInCart){
            // return back with error
            return back()->with('toast_error', 'Series already in cart');
        }else{
            // create new cart
            $user->carts()->create([
                'series_id' => $series->id,
                'price' => $series->price,
            ]);
            // return cart page
            return redirect(route('carts.index'))->with('toast_success', 'Series added to cart!');
        }
    }

    public function destroy(Cart $cart)
    {
        // delete cart
        $cart->delete();

        // check if cart is not empty
        if($cart->count() >= 1){
            // return to cart page
            return back()->with('toast_success', 'Series removed from cart!');
        }else{
            // return to landing page
            return redirect(route('landing'))->with('toast_success', 'Your Cart is empty!');
        }
    }
}
