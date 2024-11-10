@extends('layouts2.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Roles</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Roles</li>
            </ol>
        </nav>
        </div>
    </div>

    <div class="widget-content searchable-container list">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search"
                  placeholder="Search Contacts..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div
              class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="{{ route('management.roles.create') }}" id="btn-add-contact" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add Role
              </a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table id="zero_config"
              class="table border table-striped table-bordered text-nowrap align-middle">
              <thead class="header-item">
                <th>Role Name</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach ($roles as $role)
                <tr class="search-items">
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $role->JENIS_USER }}</h6>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="usr-ph-no" data-phone="+1 (070) 123-4567">
                        <a href="{{ route('management.roles.edit', $role->ID_JENIS_USER) }}" class="text-primary edit">
                            <i class="ti ti-pencil fs-5"></i></a>
                        <form action="{{ route('management.roles.delete', $role->ID_JENIS_USER) }}  " method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-primary edit">
                                <i class="ti ti-trash fs-5"></i></button>
                        </form></span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
