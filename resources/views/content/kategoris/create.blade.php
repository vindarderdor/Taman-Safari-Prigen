@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h1>Tambah Kategori</h1>

                    <form method="POST" action="{{ route('kategoris.store') }}">
                        @csrf
                        <label for="nama">Nama Kategori:</label>
                        <input type="text" name="nama" id="nama" required>

                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
