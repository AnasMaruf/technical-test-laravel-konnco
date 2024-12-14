@extends('layouts.dashboardLayout') @section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Pembayaran</h1>
        <p class="text-gray-500 text-sm">
            Pastikan data Anda sudah benar sebelum melanjutkan pembayaran
        </p>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg mb-6">
        <h4 class="text-lg font-semibold text-gray-700">Informasi Customer</h4>
        <p class="text-gray-600 mt-2">
            <strong>Nama:</strong> {{ Auth::user()->name }}
        </p>
        <p class="text-gray-600">
            <strong>Email:</strong> {{ Auth::user()->email }}
        </p>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg mb-6">
        <h4 class="text-lg font-semibold text-gray-700">Detail Pembayaran</h4>
        <p class="text-gray-600 mt-2">
            <strong>Invoice:</strong> {{ $data->invoice }}
        </p>
        <p class="text-gray-600">
            <strong>Total Harga:</strong>
            Rp{{ number_format($data->total_price) }}
        </p>
    </div>

    <div class="text-center">
        <button
            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-6 py-3 shadow-md focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all"
            id="pay-button"
        >
            Lakukan Pembayaran
        </button>
    </div>
</div>
<script
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"
></script>
<script type="text/javascript">
    document.getElementById("pay-button").onclick = function () {
        event.preventDefault();
        // SnapToken acquired from previous step
        snap.pay("{{ $data->snap_token }}", {
            // Optional
            onSuccess: function (result) {
                window.location.href =
                    "{{ route('checkout.success', $data->id) }}";
            },
            // Optional
            onPending: function (result) {
                /* You may add your own js here, this is just example */ document.getElementById(
                    "result-json"
                ).innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function (result) {
                console.log(result);
                /* You may add your own js here, this is just example */
                document.getElementById("result-json").innerHTML +=
                    JSON.stringify(result, null, 2);
            },
        });
    };
</script>
@endsection
