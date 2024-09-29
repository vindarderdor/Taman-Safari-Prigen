@extends('layouts.app')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Edit Roles</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('management.roles.update', $role->ID_JENIS_USER) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="role_name">Role Name</label>
            <input type="text" name="role_name" class="form-control" value="{{ $role->JENIS_USER }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>

    <a href="{{ route('management.roles.index') }}" class="btn btn-secondary">Back to Role List</a>
@endsection
