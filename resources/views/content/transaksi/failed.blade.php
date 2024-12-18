@extends('content.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="mb-4">Payment Failed</h1>
        <p>We're sorry, but your payment could not be processed at this time.</p>
        <p>Transaction ID: {{ $transaksi->id }}</p>
        <a href="{{ route('cart.index') }}" class="btn btn-primary mt-3">Return to Cart</a>
    </div>
</div>
@endsection