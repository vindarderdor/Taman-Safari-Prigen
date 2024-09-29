{{-- @extends('layouts.app')

@section('content') --}}
    <h5 class="card-title fw-semibold mb-4">Daftar Roles</h5>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('management.roles.create') }}" class="btn btn-primary">Create New Role</a>

    <table class="table">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->JENIS_USER }}</td>
                    <td>
                        <a href="{{ route('management.roles.edit', $role->ID_JENIS_USER) }}" class="btn btn-warning">Edit Role</a>
                        <form action="{{ route('management.roles.delete', $role->ID_JENIS_USER) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- @endsection --}}
