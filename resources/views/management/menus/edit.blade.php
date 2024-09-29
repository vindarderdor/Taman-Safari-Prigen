@extends('layouts.app')

@section('content')

    <h5 class="card-title fw-semibold mb-4">Edit Menu</h5>

    <form action="{{ route('management.menus.update', $menu->ID_MENU) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_name">Nama Menu</label>
            <input type="text" name="menu_name" class="form-control" value="{{ $menu->MENU_NAME }}" required>
        </div>

        <div class="form-group">
            <label for="menu_link">Link Menu</label>
            <input type="text" name="menu_link" class="form-control" value="{{ $menu->MENU_LINK }}" required>
        </div>
        <div class="form-group">
            <label for="parent_id">PARENT ID</label>
            <input type="text" class="form-control" name="parent_id" value="{{ $menu->PARENT_ID }}"required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
