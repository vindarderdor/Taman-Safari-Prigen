@extends('layouts.app')

@section('content')

    <h5 class="card-title fw-semibold mb-4">Edit SubMenu</h5>

    <form action="{{ route('management.submenus.update', $submenu->ID_LEVEL) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_level">Menu Level</label>
            <input type="text" name="menu_level" class="form-control" value="{{ $submenu->LEVEL }}" required>
        </div>

        <div class="form-group">
            <label for="menu_name">Nama Menu</label>
            <input type="text" name="menu_name" class="form-control" value="{{ $submenu->MENU_NAME }}" required>
        </div>

        <div class="form-group">
            <label for="menu_link">Link Menu</label>
            <input type="text" name="menu_link" class="form-control" value="{{ $submenu->MENU_LINK }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
