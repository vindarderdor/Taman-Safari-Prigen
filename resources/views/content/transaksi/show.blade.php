@extends('content.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Checkout</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    @foreach($transaksi->cartItems as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item->content->TITLE }} ({{ ucfirst($item->ticket_type) }}) x {{ $item->quantity }}</span>
                            <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>Rp {{ number_format($transaksi->total_price, 0, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment</h5>
                    <button id="pay-button" class="btn btn-primary btn-block">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $transaksi->snap_token }}', {
            onSuccess: function(result) {
                window.location.href = '{{ route("checkout.success", $transaksi->ID_USER) }}';
            },
            onPending: function(result) {
                alert('Payment pending, please complete your payment');
            },
            onError: function(result) {
                window.location.href = '{{ route("checkout.failed", $transaksi->ID_USER) }}';
            },
            onClose: function() {
                alert('You closed the payment window without completing the payment');
            }
        });
    });
</script>
@endsection