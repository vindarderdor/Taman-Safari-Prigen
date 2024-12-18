@extends('content.app')

@section('content')
<div class="container py-5">
    <h1 style="font-family: 'Mikado', sans-serif; font-weight: 900; color: #274E13; margin-bottom: 30px;">
        Dashboard Tiket Saya
    </h1>

    @if($purchasedTickets->isEmpty())
        <div class="alert alert-info">
            Anda belum membeli tiket apapun.
        </div>
    @else
        <div class="row">
            @foreach($purchasedTickets as $ticket)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header" style="background-color: #90C659; color: white;">
                            <h5 class="mb-0">{{ $ticket->content->TITLE }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Nomor Tiket:</strong> {{ $ticket->ticket_number }}</p>
                            <p><strong>Tipe Tiket:</strong> {{ ucfirst($ticket->ticket_type) }}</p>
                            <p><strong>Tanggal Kunjungan:</strong> {{ $ticket->booking_date->format('d F Y') }}</p>
                            <p><strong>Jumlah:</strong> {{ $ticket->quantity }}</p>
                            <p><strong>Total Harga:</strong> Rp {{ number_format($ticket->price * $ticket->quantity, 0, ',', '.') }}</p>
                            <p><strong>Status:</strong> 
                                @if($ticket->status == 'unused')
                                    <span class="badge bg-success">Belum Digunakan</span>
                                @else
                                    <span class="badge bg-secondary">Sudah Digunakan</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <a href="{{ route('purchased-tickets.download', $ticket->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download Tiket
                            </a>
                            <a href="{{ route('ticket.confirm', $ticket->ticket_number) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-qrcode"></i> Lihat QR Code
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

