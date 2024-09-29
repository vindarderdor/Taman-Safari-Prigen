@extends('layouts.app')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Tambah SubMenu</h5>

    <form action="{{ route('management.submenus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_level">Menu Level</label>
            <input type="text" class="form-control" name="menu_level" required>
        </div>
        <div class="form-group">
            <label for="menu_name">Menu Name</label>
            <input type="text" class="form-control" name="menu_name" required>
        </div>

        <div class="form-group">
            <label for="menu_link">Menu Link</label>
            <input type="text" class="form-control" name="menu_link" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
