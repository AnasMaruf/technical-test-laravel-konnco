<?php

namespace App\Livewire;

use App\Models\CartItem as ModelsCartItem;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;


class CartItem extends Component
{
    public $cartItems = [];
    public $totalPrice = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = ModelsCartItem::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->toArray();
        $this->totalPrice = array_sum(array_map(fn($item) => $item['total_price'], $this->cartItems));
    }

    public function updateQuantity($cartItemId, $operation)
    {
        $cartItem = ModelsCartItem::find($cartItemId);
        $product = Product::find($cartItem->product_id);

        if ($operation === 'increment' && $cartItem->quantity < $product->stok) {
            $cartItem->increment('quantity');
            session()->flash('success', 'Quantity Produk berhasil ditambahkan!');

        } elseif ($operation === 'decrement' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            session()->flash('success', 'Quantity Produk berhasil dikurangi!');
        }else{
            session()->flash('error', 'Jumlah sudah mencapai stok maksimum!');
        }
        $cartItem->update(['total_price' => $cartItem->quantity * $product->price]);
        // $this->loadCart();
        // $this->dispatch('cart-updated', ['totalPrice' => $this->totalPrice]);
        $this->dispatch('refreshCart');
    }

    public function removeCartItem($cartItemId){
        ModelsCartItem::find($cartItemId)->delete();
        session()->flash('success', 'Produk berhasil dihapus dari keranjang!');
        // $this->loadCart();
        // $this->dispatch('cart-updated', ['totalPrice' => $this->totalPrice]);
        $this->dispatch('refreshCart');
    }

    public function getListeners()
{
    return ['refreshCart' => 'refreshCart'];
}

    public function checkout($userId, $totalPrice)
    {
        $this->loadCart();
        // \Log::info('checkout', [$userId, $totalPrice]);
        $transaction = new Transaction();
        $transaction->user_id = $userId;
        $transaction->total_price = $totalPrice;
        $transaction->invoice = 'inv-'.time().'-'.Str::random(8);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => 'order-' . time() . '-' . Str::random(5),
                'gross_amount' => $totalPrice,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        $this->redirectRoute('checkout',  $transaction->id);
    }

    public function render()
    {

        return view('livewire.cart-item');
    }
}
