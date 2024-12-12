<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
        <div class="bg-white shadow-md rounded-lg p-4 card">
            <img
                src="{{ asset('storage/'.$product->image) }}"
                alt=""
                class="h-40 w-full object-cover rounded-t-md"
            />
            <div class="mt-4">
                <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                <p class="text-gray-600">
                    Price: Rp{{ number_format($product->price) }}
                </p>
                <button
                    wire:click="addToCart({{ $product->id }})"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Total Price and Cart Link -->
    <div class="mt-6">
        <a
            href="/cart"
            class="bg-primary-600 text-white px-4 py-2 rounded-sm fixed bottom-4 right-4"
        >
            Total Price: Rp{{ number_format($totalPrice) }}
        </a>
    </div>
</div>
