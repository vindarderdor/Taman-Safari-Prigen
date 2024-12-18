@extends('content.app')

@section('content')

    <div class="widget-content searchable-container list">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-2 col-xl-1">
                <h4 class="fw-semibold mb-0">Tiket</h4>
            </div>
            <div
              class="col-md-2 col-xl-11 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="{{ route('tikets.create') }}" id="btn-add-contact" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Tiket
              </a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table id="zero_config"
              class="table border table-striped table-bordered text-nowrap align-middle">
              <thead class="header-item">
                <th>ID</th>
                <th>Title</th>
                <th>Deskripsi</th>
                <th>Harga Adult</th>
                <th>Harga Child</th>
                <th>img</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach($tikets as $tiket)
                <tr class="search-items">
                    <td>
                      <span class="usr-email-addr">{{ $tiket->ID_KONTEN }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $tiket->TITLE }}</span>
                    </td>
                    <td>
                        <span class="usr-email-addr" data-email="adams@mail.com">{{ $tiket->DESCRIPSION }}</span>
                    </td>
                    <td>
                        <span class="usr-email-addr" data-email="adams@mail.com">{{ $tiket->HARGA_ADULT}}</span>
                    </td>
                    <td>
                        <span class="usr-email-addr" data-email="adams@mail.com">{{ $tiket->HARGA_CHILD}}</span>
                    </td>
                    <td>
                        <span class="usr-location" data-location="Boston, USA">{{ $tiket->IMAGE }}</span>
                    </td>
                    <td>
                        <span class="usr-ph-no" data-phone="+1 (070) 123-4567">
                            <a href="{{ route('tikets.edit', $tiket->ID_KONTEN) }}" class="text-primary edit">
                                <i class="ti ti-pencil fs-5"></i></a>
                            <form action="{{ route('tikets.destroy', $tiket->ID_KONTEN) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-primary edit">
                                    <i class="ti ti-trash fs-5"></i></button>
                            </form></span>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
{{-- @extends('layouts.app')

@section('content')
<h1>book Management</h1>
<a href="{{ route('tikets.create') }}" class="btn btn-primary">Create book</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>judul</th>
            <th>Kategori</th>
            <th>kode</th>
            <th>Pengarang</th>
            <th>gambar</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bukus as $buku)
            <tr>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->kategori->nama }}</td>
                <td>{{ $buku->kode }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>
                    @if($buku->gambar)
                        <img src="{{ Storage::url($buku->gambar) }}" alt="Gambar Buku" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection --}}
