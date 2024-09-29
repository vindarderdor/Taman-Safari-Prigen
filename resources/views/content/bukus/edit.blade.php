@extends('layouts.app')

@section('content')
<h1>Edit Buku</h1>
<form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
    </div>
    <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" class="form-control" id="kode" name="kode" value="{{ $buku->kode }}" required>
    </div>
    <div class="form-group">
        <label for="pengarang">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}" required>
    </div>
    <div class="form-group">
        <label for="kategori_id">Kategori</label>
        <select class="form-control" id="kategori_id" name="kategori_id" required>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar Buku</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
        @if($buku->gambar)
            <img src="{{ asset('storage/' . $buku->gambar) }}" alt="Gambar Buku" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Buku</button>
</form>
@endsection
