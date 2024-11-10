@extends('content.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0"> create Buku</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Tambah Buku</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="{{ route('bukus.store') }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label fw-semibold col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Pengarang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText3" class="form-label fw-semibold col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                  <select class="form-select" id="exampleInputSelect2" aria-label="Default select example" name="kategori_id">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
    </div>
@endsection
