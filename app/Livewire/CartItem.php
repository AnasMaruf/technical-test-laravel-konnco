<?php

namespace App\Livewire;

use App\Models\CartItem as ModelsCartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        } elseif ($operation === 'decrement' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        $cartItem->update(['total_price' => $cartItem->quantity * $product->price]);

        $this->loadCart();
    }
    public function render()
    {
        return view('livewire.cart-item');
    }
}
