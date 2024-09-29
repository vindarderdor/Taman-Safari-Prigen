@extends('layouts.app')

@section('content')

    <h5 class="card-title fw-semibold mb-4">Edit User</h5>
    <form action="{{ route('management.users.update', $user->ID_USER) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->NAMA_USER }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $user->USERNAME }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{ $role->ID_JENIS_USER }}" {{ $role->ID_JENIS_USER == $user->ID_JENIS_USER ? 'selected' : '' }}>
                        {{ $role->JENIS_USER }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
