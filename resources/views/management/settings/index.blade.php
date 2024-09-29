{{-- @extends('layouts.app')

@section('content') --}}

    <h5 class="card-title fw-semibold mb-4">Daftar Settings</h5>
    <a href="{{ route('management.settings.create') }}" class="btn btn-primary">Tambah Setting</a>
    <table class="table">
        <thead>
            <tr>
                <th>No Setting</th>
                <th>Role (Jenis User)</th>
                <th>Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->NO_SETTING }}</td>
                <td>{{ $setting->JENIS_USER }}</td> <!-- Nama Role (Jenis User) -->
                <td>{{ $setting->MENU_NAME }}</td> <!-- Nama Menu -->
                <td>
                    <form action="{{ route('management.settings.delete', $setting->NO_SETTING) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{-- @endsection --}}
