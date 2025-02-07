@extends('user.layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-2xl font-bold mb-4">Pembayaran</h1>
        <button id="pay-button" type="button"
            class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600">Bayar
            Sekarang</button>
    </div>

@endsection
