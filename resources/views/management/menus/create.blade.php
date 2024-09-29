@extends('layouts.app')

@section('content')
    <h1>Create New Menu</h1>

    <form action="{{ route('management.menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_name">Menu Name</label>
            <input type="text" class="form-control" name="menu_name" required>
        </div>

        <div class="form-group">
            <label for="menu_link">Menu Link</label>
            <input type="text" class="form-control" name="menu_link" required>
        </div>
        <div class="form-group">
            <label for="parent_id">PARENT ID</label>
            <input type="text" class="form-control" name="parent_id" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
