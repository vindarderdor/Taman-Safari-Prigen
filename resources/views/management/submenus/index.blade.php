{{-- @extends('layouts.app')

@section('content') --}}

    <h5 class="card-title fw-semibold mb-4">Daftar SubMenu</h5>
    <a href="{{ route('management.submenus.create') }}" class="btn btn-primary mb-3">Tambah SubMenu</a>
    <table class="table">
        <thead>
            <tr>
                <th>Level</th>
                <th>Nama SubMenu</th>
                <th>Link SubMenu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submenus as $submenu)
            <tr>
                <td>{{ $submenu->LEVEL }}</td>
                <td>{{ $submenu->MENU_NAME }}</td>
                <td>{{ $submenu->MENU_LINK }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('management.submenus.edit', $submenu->ID_LEVEL) }}" class="btn btn-warning">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('management.submenus.delete', $submenu->ID_LEVEL) }}" method="POST" style="display:inline;">
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
