@extends('content.app')

@section('content')
<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
      <h4 class="fw-semibold mb-0">Profile</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
  </div>
            <div class="position-relative overflow-hidden">
              <div class="position-relative overflow-hidden rounded-3">
                <img src="{{ asset('assets/images/backgrounds/profilebg.jpg') }}" alt="" class="w-100">
              </div>
              <div class="card mx-9 mt-n5">
                <div class="card-body pb-0">
                  <div class="d-md-flex align-items-center justify-content-between text-center text-md-start">
                    <div class="d-md-flex align-items-center">
                      <div class="rounded-circle position-relative mb-9 mb-md-0 d-inline-block">
                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle"
                          width="100" height="100">
                        <span
                          class="text-bg-primary rounded-circle text-white d-flex align-items-center justify-content-center position-absolute bottom-0 end-0 p-1 border border-2 border-white"><i
                            class="ti ti-plus"></i></span>
                      </div>
                      <div class="ms-0 ms-md-3 mb-9 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-1">
                          <h4 class="me-7 mb-0 fs-7">{{ Auth()->user()->NAMA_USER }}</h4>
                          {{-- <span
                            class="badge fs-2 fw-bold rounded-pill bg-primary-subtle text-primary border-primary border">Admin</span> --}}
                        </div>
                        <p class="fs-4 mb-1">{{ Auth()->user()->jenisUser->JENIS_USER }}</p>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                          <span class="bg-success p-1 rounded-circle"></span>
                          <h6 class="mb-0 ms-2">Active</h6>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary px-3 shadow-none">Edit Profile</a>
                  </div>
                  <ul class="nav nav-pills user-profile-tab mt-4 justify-content-center justify-content-md-start"
                    id="pills-tab" role="tablist">
                    <li class="nav-item me-2 me-md-3" role="presentation">
                      <button
                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent py-6"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="true">
                        <i class="ti ti-user-circle me-0 me-md-6  fs-6"></i>
                        <span class="d-none d-md-block">My Profile</span>
                      </button>
                    </li>
                    <li class="nav-item me-2 me-md-3" role="presentation">
                      <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent py-6"
                        id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                        role="tab" aria-controls="pills-followers" aria-selected="false">
                        <i class="ti ti-users me-0 me-md-6  fs-6"></i>
                        <span class="d-none d-md-block">Teams</span>
                      </button>
                    </li>
                    <li class="nav-item me-2 me-md-3" role="presentation">
                      <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent py-6"
                        id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button"
                        role="tab" aria-controls="pills-friends" aria-selected="false">
                        <i class="ti ti-layout-grid-add me-0 me-md-6  fs-6"></i>
                        <span class="d-none d-md-block">Projects</span>
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent py-6"
                        id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button"
                        role="tab" aria-controls="pills-gallery" aria-selected="false">
                        <i class="ti ti-id me-0 me-md-6  fs-6"></i>
                        <span class="d-none d-md-block">Connections</span>
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
@endsection
