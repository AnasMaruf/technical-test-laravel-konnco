<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-semibold mb-6">Shopping Cart</h1>
        @if (session()->has('success'))
        <div
            id="flash-message"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 z-50"
            wire:key="flash-message"
        >
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session("success") }}</span>
            <!-- Tombol close -->
            <button
                onclick="document.getElementById('flash-message').style.display='none'"
                class="absolute top-0 right-0 px-2 py-1 text-4xl text-green-700"
                aria-label="Close"
            >
                &times;
            </button>
        </div>
        @endif @if (session()->has('error'))
        <div
            id="flash-message-error"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 z-50"
            wire:key="flash-message"
        >
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session("error") }}</span>
            <!-- Tombol close -->
            <button
                onclick="document.getElementById('flash-message-error').style.display='none'"
                class="absolute top-0 right-0 px-2 py-1 text-4xl text-red-700"
                aria-label="Close"
            >
                &times;
            </button>
        </div>
        @endif
        <!-- Cart Items -->
        <div class="space-y-6">
            @if (collect($cartItems)->isEmpty())
            <p class="text-gray-500 text-3xl text-center">
                Your cart is empty.
            </p>
            @else @foreach ($cartItems as $item)
            <div class="flex items-center justify-between border-b pb-4">
                <div class="flex items-center space-x-4">
                    <img
                        src="{{ asset('storage/'.$item['product']['image']) }}"
                        alt="Product Image"
                        class="w-20 h-20 object-cover rounded-md"
                    />
                    <div>
                        <h2 class="text-lg font-medium">
                            {{ $item["product"]["name"] }}
                        </h2>
                        <p class="text-gray-500 text-sm">
                            Rp {{ number_format($item["total_price"]) }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Quantity Increment/Decrement -->
                    <div class="flex items-center border rounded-md">
                        <button
                            wire:click="updateQuantity({{
                                $item['id']
                            }}, 'decrement')"
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700"
                        >
                            -
                        </button>
                        <input
                            type="text"
                            value="{{ $item['quantity'] }}"
                            class="w-12 text-center border-l border-r focus:outline-none"
                            readonly
                        />
                        <button
                            wire:click="updateQuantity({{
                                $item['id']
                            }}, 'increment')"
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700"
                        >
                            +
                        </button>
                    </div>
                    <!-- Remove Button -->
                    <button
                        wire:click="removeCartItem({{ $item['id'] }})"
                        wire:loading.attr="disabled"
                        class="text-red-500 hover:text-red-700 font-medium"
                    >
                        Remove
                    </button>
                    <div
                        wire:loading
                        wire:target="removeCartItem"
                        class="mt-2 text-center"
                    >
                        Removing...
                    </div>
                </div>
            </div>
            @endforeach @endif
        </div>

        <!-- Cart Summary -->
        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between text-lg font-medium">
                <p>Total</p>
                <p>Rp{{ number_format($totalPrice) }}</p>
            </div>
            @if(collect($cartItems)->isEmpty())
            <a
                href="/"
                class="w-full block text-center mt-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition"
            >
                Back to home
            </a>
            @else
            <button
                wire:click="checkout({{ Auth::user()->id }},{{ $totalPrice }})"
                wire:loading.attr="disabled"
                id="checkout-btn"
                class="w-full mt-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition"
            >
                Lanjutkan Pembayaran
            </button>
            <div wire:loading wire:target="checkout" class="mt-2 text-center">
                Processing...
            </div>
            @endif
        </div>
    </div>
</div>
