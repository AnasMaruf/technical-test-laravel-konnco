<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function payment($transactionId)
    {
        $title = "Checkout Page";
        $name = Auth::user()->name;
        $data = Transaction::find($transactionId);
        return view('dashboard.checkout.payment', compact('data','title','name'));
    }

    public function success($id){
        $title = "Checkout Page";
        $name = Auth::user()->name;

        $transaction = Transaction::find($id);
        $cartItems = CartItem::where('user_id', $transaction->user_id)->get();

        foreach ($cartItems as $cart) {
            $product = Product::find($cart->product_id);
            if ($product) {
                $product->stok -= $cart->quantity;
                $product->save();
            }
        }

        $transaction->status = "success";
        $transaction->save();

        CartItem::where('user_id', $transaction->user_id)->delete();
        Product::where('stok', 0)->update(['status' => 'inactive']);
        return view('dashboard.checkout.success', compact('transaction', 'title','name'));
    }
}
