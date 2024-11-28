@extends('content.app')

@section('content')

    <div class="widget-content searchable-container list">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-2 col-xl-1">
                <h4 class="fw-semibold mb-0">Jadwal</h4>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table id="zero_config"
              class="table border table-striped table-bordered text-nowrap align-middle">
              <thead class="header-item">
                <th>Hari</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Update At</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach($jadwals as $jadwal)
                <tr class="search-items">
                    <td>
                      <span class="usr-email-addr">{{ $jadwal->HARI }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $jadwal->JAM_BUKA }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $jadwal->JAM_TUTUP }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $jadwal->updated_at}}</span>
                    </td>
                    <td>
                        <span class="usr-ph-no" data-phone="+1 (070) 123-4567">
                            <a href="{{ route('jadwals.edit', $jadwal->ID_JADWAL) }}" class="text-primary edit">
                                <i class="ti ti-pencil fs-5"></i></a>
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
<a href="{{ route('jadwals.create') }}" class="btn btn-primary">Create book</a>
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
