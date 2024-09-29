@extends('layouts.app')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Tambah Roles</h5>

    <form action="{{ route('management.roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role_name">Role Name</label>
            <input type="text" class="form-control" name="role_name" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
