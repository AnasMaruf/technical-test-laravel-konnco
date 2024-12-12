@extends('layouts.dashboardLayout') @section('content')
<!-- <div class="items-center">
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-5">All Products</h1>
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
                    <form action="" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="product_id" value="" />
                        <button
                            type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                        >
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/cart" class="bg-primary-600 text-white px-4 py-2 rounded-sm"
            >menampilkan total price product yang dimasukkan keranjang</a
        >
    </div>
</div> -->
<livewire:homepage />
@endsection
