@extends('layouts.dashboardLayout') @section('content')
<!-- <div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-semibold mb-6">Shopping Cart</h1>

        <div class="space-y-6">
            <div class="flex items-center justify-between border-b pb-4">
                <div class="flex items-center space-x-4">
                    <img
                        src="{{ asset('images/product1.png') }}"
                        alt="Product Image"
                        class="w-20 h-20 object-cover rounded-md"
                    />
                    <div>
                        <h2 class="text-lg font-medium">Product Name</h2>
                        <p class="text-gray-500 text-sm">$25.00</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center border rounded-md">
                        <button
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700"
                        >
                            -
                        </button>
                        <input
                            type="text"
                            value="1"
                            class="w-12 text-center border-l border-r focus:outline-none"
                        />
                        <button
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700"
                        >
                            +
                        </button>
                    </div>
                    <button class="text-red-500 hover:text-red-700 font-medium">
                        Remove
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between text-lg font-medium">
                <p>Total</p>
                <p>$25.00</p>
            </div>
            <button
                class="w-full mt-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition"
            >
                Checkout
            </button>
        </div>
    </div>
</div> -->
<livewire:cart-item />
@endsection
