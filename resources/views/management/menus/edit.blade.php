@extends('layouts2.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0"> Edit Menu</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Edit Menu</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="{{ route('management.menus.update', $menu->ID_MENU) }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label fw-semibold col-sm-3 col-form-label">Nama Menu</label>
                <div class="col-sm-9">
                    <input type="text" name="menu_name" class="form-control" value="{{ $menu->MENU_NAME }}" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Link Menu</label>
                <div class="col-sm-9">
                    <input type="text" name="menu_link" class="form-control" value="{{ $menu->MENU_LINK }}" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">PARENT ID</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="parent_id" value="{{ $menu->PARENT_ID }}"required>
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
