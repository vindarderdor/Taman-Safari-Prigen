@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama Kategori:</label>
        <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}" required>

        <button type="submit">Update Kategori</button>
    </form>
@endsection
