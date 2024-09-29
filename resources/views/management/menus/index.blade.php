{{-- @extends('layouts.app')

@section('content') --}}

    <h5 class="card-title fw-semibold mb-4">Daftar Menu</h5>
    <a href="{{ route('management.menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Link Menu</th>
                <th>PARENT ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->MENU_NAME }}</td>
                <td>{{ $menu->MENU_LINK }}</td>
                <td>{{ $menu->PARENT_ID }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('management.menus.edit', $menu->ID_MENU) }}" class="btn btn-warning">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('management.menus.delete', $menu->ID_MENU) }}" method="POST" style="display:inline;">
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
