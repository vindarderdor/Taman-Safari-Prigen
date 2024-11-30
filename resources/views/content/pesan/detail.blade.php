@extends('content.app')

@section('content')
<div class="shop-detail">
    <div class="card shadow-none border">
      <div class="card-body p-4">
        <div class="row">
          <div class="col-lg-6">
            <div id="sync1" class="owl-carousel owl-theme">
                <div class="item rounded overflow-hidden">
                    <div class="image-container">
                      <img src="{{ asset('/assets/images/blog/blog-img1.png') }}" alt="Book Image" class="centered-image">
                    </div>
                  </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="shop-content">
              <h4>{{ $ticket->TITLE }}</</h4>
              <p class="mb-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem numquam ipsam et quos laborum veniam rerum eos aliquam. Sint deserunt dolore similique ducimus natus consequuntur maiores assumenda veritatis! Ducimus, odit!</p>
              <h4 class="fw-semibold mb-3">Harga: Rp {{ number_format($ticket->HARGA, 0, ',', '.') }}</h4>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
              </div>
              <div class="d-flex align-items-center gap-7 pb-7 mb-7 border-bottom">
                <div class="input-group input-group-sm rounded">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $ticket->ID }}">
                        <input type="hidden" name="title" value="{{ $ticket->TITLE }}">
                        <input type="hidden" name="harga" value="{{ $ticket->HARGA }}">
                        
                        <div class="form-group">
                            <label for="jumlah">Jumlah Tiket:</label>
                            <input type="number" name="jumlah" id="jumlah" value="1" min="1" class="form-control" style="width: 100px;">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Tambah ke Keranjang</button>
                    </form>
                </div>
              </div>
              <p class="mb-0">Dispatched in 2-3 weeks</p>
              <a href="javascript:void(0)">Why the longer time for delivery?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
{{-- <div class="container">
    <div class="card">
        <img class="card-img-top" src="{{ asset('assets/images/tickets/' . $ticket->IMAGE) }}" alt="Tiket Image" style="width: 100%; height: auto;">
        <div class="card-body">
            <h2 class="card-title">{{ $ticket->TITLE }}</h2>
            <p class="card-text">{{ $ticket->DESCRIPTION }}</p>
            <h4>Harga: Rp {{ number_format($ticket->HARGA, 0, ',', '.') }}</h4>
            
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $ticket->ID }}">
                <input type="hidden" name="title" value="{{ $ticket->TITLE }}">
                <input type="hidden" name="harga" value="{{ $ticket->HARGA }}">
                
                <div class="form-group">
                    <label for="jumlah">Jumlah Tiket:</label>
                    <input type="number" name="jumlah" id="jumlah" value="1" min="1" class="form-control" style="width: 100px;">
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
    <a href="/" class="btn btn-secondary mt-3">Kembali ke Tiket</a>
</div> --}}
@endsection