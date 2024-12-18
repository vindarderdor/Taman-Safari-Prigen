@extends('content.app')

@section('content')
    {{-- <div class="position-relative overflow-hidden">
        <div class="position-relative overflow-hidden rounded-3">
            <img src="{{ asset('assets/images/backgrounds/banner.png') }}" alt="" class="w-100">
        </div>
    </div> --}}
    <section class="hero-section bg-body-secondary position-relative overflow-hidden">
        <div class="container py-5">
            <h1 style="font-family: 'Mikado', sans-serif; font-weight: 900; color: #274E13; margin-bottom: 30px; text-align: center;">
                Keranjang Belanja
            </h1>
            
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8 mb-4">
                    @forelse($cartItems as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3 mb-md-0">
                                        <img src="{{ asset('/assets/images/blog/blog-img1.png') }}" alt="{{ $item->content->TITLE }}" class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-9">
                                        <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">{{ $item->content->TITLE }}</h4>
                                        <p class="text-muted">{{ Str::limit($item->content->DESCRIPSION, 100) }}</p>
                                        <p class="text-muted">Tanggal Kunjungan: {{ $item->booking_date->format('d F Y') }}</p>
                                        <p class="mb-2">
                                            <span class="font-weight-bold">Tipe Tiket:</span> 
                                            {{ $item->ticket_type === 'adult' ? 'Dewasa' : 'Anak-anak' }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="input-group" style="max-width: 200px;">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity({{ $item->id }}, -1)" style="border-color: #274E13;">-</button>
                                                <input type="text" class="form-control text-center" value="{{ $item->quantity }}" id="quantity-{{ $item->id }}" readonly style="border-color: #274E13;">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity({{ $item->id }}, 1)" style="border-color: #274E13;">+</button>
                                            </div>
                                            <p class="h5 mb-0" style="color: #90C659;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                        </div>
                                        <button onclick="removeItem({{ $item->id }})" class="btn btn-sm btn-outline-danger mt-2">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            Keranjang belanja Anda kosong.
                        </div>
                    @endforelse
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-family: 'Mikado', sans-serif; color: #274E13; margin-bottom: 20px;">Ringkasan Belanja</h4>
                            @php
                                $groupedItems = $cartItems->groupBy('content_id');
                            @endphp
                            @foreach($groupedItems as $contentId => $items)
                                <div class="mb-3">
                                    <h5 style="color: #274E13;">{{ $items->first()->content->TITLE }}</h5>
                                    @foreach($items as $item)
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>
                                                {{ $item->ticket_type === 'adult' ? 'Dewasa' : 'Anak-anak' }} 
                                                (x{{ $item->quantity }})
                                            </span>
                                            <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Total</strong>
                                <strong style="color: #90C659;">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                            </div>
                            <form action="{{ route('checkout.process') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #274E13; border: none; padding: 15px; font-weight: bold; font-size: 16px;">
                                    Lanjutkan ke Pembayaran
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function updateQuantity(itemId, change) {
            fetch(`/cart/update/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: change })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }

        function removeItem(itemId) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                fetch(`/cart/remove/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection