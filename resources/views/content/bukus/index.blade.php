@extends('layouts.app')

@section('content')
<h1>book Management</h1>
<a href="{{ route('bukus.create') }}" class="btn btn-primary">Create book</a>
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

@endsection
