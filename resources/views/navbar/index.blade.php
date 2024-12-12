<div class="container mx-auto">
    <div class="header py-3 bg-gray-400 px-10">
        <div class="flex justify-between items-center">
            <a href="/" class="flex gap-2 items-center">
                <img
                    src="{{ asset('images/profile.png') }}"
                    alt=""
                    class="rounded rounded-circle object-cover h-10 w-10"
                />
                <h3>{{ $name }}</h3>
            </a>
            <div class="flex gap-2">
                <a
                    href="{{ route('cart.index') }}"
                    class="bg-blue-500 px-3 py-1 text-white font-bold"
                    >Cart</a
                >
                @if(Auth::user()->role == 'admin')
                <a
                    href="/admin"
                    class="bg-blue-500 px-3 py-1 text-white font-bold"
                    >Dashboard</a
                >
                @endif
                <form action="/logout" method="post">
                    @csrf
                    <button class="bg-blue-500 px-3 py-1 text-white font-bold">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
