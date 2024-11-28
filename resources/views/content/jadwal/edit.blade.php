@extends('content.app')

@section('content')
    <h1>Edit Jadwal: {{ $jadwal->HARI }}</h1>
    <form action="{{ route('jadwals.update', $jadwal->ID_JADWAL) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Jam Buka</label>
            <input type="time" name="JAM_BUKA" value="{{ $jadwal->JAM_BUKA }}" required>
        </div>
        <div>
            <label>Jam Tutup</label>
            <input type="time" name="JAM_TUTUP" value="{{ $jadwal->JAM_TUTUP }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection