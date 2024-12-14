<div>
    <h1 class="text-center text-2xl font-bold my-3">All Products</h1>
    @if (session()->has('success'))
    <div
        id="flash-message"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
    >
        <div wire:loading wire:target="addToCart" class="mt-2 text-center">
            Processing...
        </div>
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
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
    >
        <div wire:loading wire:target="addToCart" class="mt-2 text-center">
            Processing...
        </div>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product) @if($product->stok != 0 &&
        $product->status == 'active')
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
                <p>Stock: {{ $product->stok }}</p>
                <button
                    wire:click="addToCart({{ $product->id }})"
                    wire:loading.attr="disabled"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Add to Cart
                </button>
            </div>
        </div>
        @endif @endforeach
    </div>

    <!-- Total Price and Cart Link -->
    <div class="mt-6">
        <a
            href="/cart"
            class="bg-primary-600 text-white px-4 py-2 rounded-sm fixed bottom-4 right-4"
        >
            <span wire:loading wire:target="addToCart" class="mt-2 text-center">
                Processing...
            </span>
            Total Price: Rp{{ number_format($totalPrice) }}
        </a>
    </div>
</div>
