@extends('layouts2.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0"> Edit Kategori</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Edit Kategori</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label fw-semibold col-sm-3 col-form-label">Nama Kategori</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
    </div>
@endsection
