@extends('layouts.app')

@section('content')
<h1>Category Management</h1>
<a href="{{ route('kategoris.create') }}" class="btn btn-primary">Create kategori</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>
                    <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" style="display: inline-block;">
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
