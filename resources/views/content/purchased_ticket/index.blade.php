@extends('content.app')

@section('content')
<div class="container py-5">
    <h1 style="font-family: 'Mikado', sans-serif; font-weight: 900; color: #274E13; margin-bottom: 30px;">
        Tiket Saya
    </h1>

    @if($purchasedTickets->isEmpty())
        <div class="alert alert-info">
            Anda belum membeli tiket apapun.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($purchasedTickets as $ticket)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header" style="background-color: #90C659; color: white;">
                            <h5 class="mb-0">{{ $ticket->content->TITLE }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Tipe Tiket:</strong> {{ ucfirst($ticket->ticket_type) }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Kunjungan:</strong><br>
                                {{ $ticket->booking_date->format('d F Y') }}
                            </div>
                            <div class="mb-3">
                                <strong>Jumlah:</strong><br>
                                {{ $ticket->quantity }}
                            </div>
                            <div class="mb-3">
                                <strong>Total Harga:</strong><br>
                                Rp {{ number_format($ticket->price * $ticket->quantity, 0, ',', '.') }}
                            </div>
                            <div class="mb-3">
                                <strong>Nomor Tiket:</strong><br>
                                {{ $ticket->ticket_number }}
                            </div>
                            
                            <a href="{{ route('purchased-tickets.download', $ticket->id) }}" 
                               class="btn btn-success w-100">
                                <i class="fas fa-download me-2"></i> Download Tiket
                            </a>
                        </div>
                        {{-- <div class="card-footer text-muted">
                            <small>Dibeli pada: {{ $ticket->transaction->created_at->format('d F Y H:i') }}</small>
                            <br>
                            <small>Transaction ID: {{ $ticket->transaction_id }}</small>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

