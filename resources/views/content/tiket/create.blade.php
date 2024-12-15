@extends('content.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0"> create tiket</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Tambah tiket</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="{{ route('tikets.store') }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label fw-semibold col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul" name="TITLE" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kode" name="DESCRIPSION" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Harga Adult</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="kode" name="HARGA_ADULT" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Harga Child</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="kode" name="HARGA_CHILD" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">IMG</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pengarang" name="IMAGE" required>
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
