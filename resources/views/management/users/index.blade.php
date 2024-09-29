{{-- @extends('layouts.app')

@section('content') --}}



    <h5 class="card-title fw-semibold mb-4">Daftar Users</h5>
    <a href="{{ route('management.users.create') }}" class="btn btn-primary" id="create-user-link">Tambah User</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->NAMA_USER }}</td>
                <td>{{ $user->USERNAME }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->JENIS_USER }}</td>
                <td>
                    <a href="{{ route('management.users.edit', $user->ID_USER) }}" class="btn btn-warning edit-user-link">Edit</a>
                    <form action="{{ route('management.users.delete', $user->ID_USER) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{--
@endsection --}}
