@extends('content.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8" style="font-family: 'Mikado, sans-serif'; color: #274E13;">
        Pembayaran
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Order Summary -->
        <x-card>
            <x-card-header>
                <x-card-title style="color: #274E13;">Ringkasan Pesanan</x-card-title>
            </x-card-header>
            <x-card-content>
                @foreach($cartItems as $item)
                    <div class="flex justify-between mb-2">
                        <span>{{ $item->content->TITLE }} (x{{ $item->quantity }})</span>
                        <span>Rp {{ number_format($item->content->HARGA * $item->quantity, 0, ',', '.') }}</span>
                    </div>
                @endforeach
                <div class="border-t pt-2 mt-2">
                    <div class="flex justify-between font-bold">
                        <span>Total</span>
                        <span style="color: #90C659;">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </x-card-content>
        </x-card>

        <!-- Payment Information -->
        <x-card>
            <x-card-header>
                <x-card-title style="color: #274E13;">Informasi Pembayaran</x-card-title>
            </x-card-header>
            <x-card-content>
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="grid gap-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-label for="first_name">Nama Depan</x-label>
                                <x-input id="first_name" name="first_name" required />
                            </div>
                            <div>
                                <x-label for="last_name">Nama Belakang</x-label>
                                <x-input id="last_name" name="last_name" required />
                            </div>
                        </div>
                        <div>
                            <x-label for="email">Email</x-label>
                            <x-input id="email" name="email" type="email" required />
                        </div>
                        <div>
                            <x-label for="phone">Nomor Telepon</x-label>
                            <x-input id="phone" name="phone" type="tel" required />
                        </div>
                        <button type="submit" class="w-full btn" style="background-color: #274E13; color: white;">
                            Lanjutkan ke Pembayaran
                        </button>
                    </div>
                </form>
            </x-card-content>
        </x-card>
    </div>
</div>
@endsection