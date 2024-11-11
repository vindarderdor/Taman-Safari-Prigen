@extends('layouts.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0"> Edit User</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Edit User</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="{{ route('management.users.update', $user->ID_USER) }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label fw-semibold col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ $user->NAMA_USER }}" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="{{ $user->USERNAME }}" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText2"
                  class="form-label fw-semibold col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText3" class="form-label fw-semibold col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <select class="form-select" id="exampleInputSelect2" aria-label="Default select example" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->ID_JENIS_USER }}" {{ $role->ID_JENIS_USER == $user->ID_JENIS_USER ? 'selected' : '' }}>
                            {{ $role->JENIS_USER }}
                        </option>
                    @endforeach
                  </select>
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
