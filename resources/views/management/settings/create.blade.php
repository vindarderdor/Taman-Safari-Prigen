@extends('layouts.app')

@section('content')

    <h5 class="card-title fw-semibold mb-4">Setting Menu</h5>
    <form action="{{ route('management.settings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->ID_JENIS_USER }}">{{ $role->JENIS_USER }}</option> <!-- Menampilkan Nama Role -->
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="menu">Menu</label>
            <select name="menu" class="form-control" required>
                <option value="">Pilih Menu</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->ID_MENU }}">{{ $menu->MENU_NAME }}</option> <!-- Menampilkan Nama Menu -->
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

@endsection
