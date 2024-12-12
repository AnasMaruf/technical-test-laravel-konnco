<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Homepage extends Component
{
    public $products = [];
    public $totalPrice = 0;

    public function mount()
    {
        $this->products = Product::where('status', 'active')->get();
        $this->updateTotalPrice();
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if ($product->stok <= 0) {
            session()->flash('error', 'Stok habis!');
            return;
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity < $product->stok) {
                $cartItem->increment('quantity');
                $cartItem->update(['total_price' => $cartItem->quantity * $product->price]);
            } else {
                session()->flash('error', 'Jumlah sudah mencapai stok maksimum!');
            }
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
                'total_price' => $product->price,
            ]);
        }

        $this->updateTotalPrice();
    }

    public function updateTotalPrice()
    {
        $this->totalPrice = CartItem::where('user_id', Auth::id())
            ->sum('total_price');
    }

    public function render()
    {
        return view('livewire.homepage', [
            'products' => $this->products,
        ]);
    }
}
