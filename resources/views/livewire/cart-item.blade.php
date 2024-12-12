<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-semibold mb-6">Shopping Cart</h1>

        <!-- Cart Items -->
        <div class="space-y-6">
            <!-- Single Cart Item -->
            @foreach ($cartItems as $item)
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
                    <button class="text-red-500 hover:text-red-700 font-medium">
                        Remove
                    </button>
                </div>
            </div>
            @endforeach
            <!-- Add more cart items here as needed -->
        </div>

        <!-- Cart Summary -->
        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between text-lg font-medium">
                <p>Total</p>
                <p>Rp{{ number_format($totalPrice) }}</p>
            </div>
            <button
                class="w-full mt-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition"
            >
                Checkout
            </button>
        </div>
    </div>
</div>
