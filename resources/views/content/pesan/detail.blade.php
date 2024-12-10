@extends('content.app')

@section('content')
    {{-- <div class="position-relative overflow-hidden">
        <div class="position-relative overflow-hidden rounded-3">
            <img src="{{ asset('assets/images/backgrounds/banner.png') }}" alt="" class="w-100">
        </div>
    </div> --}}
    <section class="hero-section bg-body-secondary position-relative overflow-hidden">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <!-- Ticket Title -->
                            <h2 style="font-family: 'Mikado', sans-serif; font-weight: 900; color: #274E13; margin-bottom: 20px;">
                                {{ $ticket->TITLE }}
                            </h2>

                            <!-- Ticket Image -->
                            <div class="mb-4">
                                <img src="{{ asset('/assets/images/blog/blog-img1.png') }}" alt="Ticket Image" class="img-fluid rounded">
                            </div>

                            <!-- Ticket Description -->
                            <div class="mb-4">
                                <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Deskripsi</h4>
                                <p style="color: #555;">{{ $ticket->DESCRIPSION }}</p>
                            </div>

                            <!-- Price Information -->
                            <div class="mb-4">
                                <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Harga</h4>
                                <p class="h3" style="color: #90C659;">Rp {{ number_format($ticket->HARGA, 0, ',', '.') }}</p>
                            </div>

                            <!-- Ticket Selection Form -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->ID_KONTEN }}">
                                
                                <div class="mb-4">
                                    <label for="quantity" class="form-label" style="font-family: 'Mikado', sans-serif; color: #274E13;">Jumlah Tiket</label>
                                    <div class="input-group" style="max-width: 200px;">
                                        <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()" style="border-color: #274E13;">-</button>
                                        <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1" max="10" readonly style="border-color: #274E13;">
                                        <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()" style="border-color: #274E13;">+</button>
                                    </div>
                                </div>

                                <!-- Total Price -->
                                <div class="mb-4">
                                    <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Total</h4>
                                    <p class="h3" style="color: #90C659;" id="totalPrice">
                                        Rp {{ number_format($ticket->HARGA, 0, ',', '.') }}
                                    </p>
                                </div>

                                <!-- Add to Cart Button -->
                                <button type="submit" class="btn btn-primary w-100" style="background-color: #274E13; border: none; padding: 15px; font-weight: bold; font-size: 16px;">
                                    Tambahkan ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for quantity control and price calculation -->
    <script>
        const price = {{ $ticket->HARGA }};
        
        function updateTotal(quantity) {
            const total = price * quantity;
            document.getElementById('totalPrice').textContent = 
                'Rp ' + total.toLocaleString('id-ID');
        }

        function incrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue < 10) {
                input.value = currentValue + 1;
                updateTotal(currentValue + 1);
            }
        }

        function decrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                updateTotal(currentValue - 1);
            }
        }
    </script>
@endsection

