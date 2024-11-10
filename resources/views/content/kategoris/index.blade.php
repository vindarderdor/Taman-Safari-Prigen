@extends('content.app')

@section('content')

    <div class="widget-content searchable-container list">
        <div class="card card-body">
          <div class="row">
            <div class="col-md-2 col-xl-4">
                <h4 class="fw-semibold mb-0">Kategori</h4>
            </div>
            <div
              class="col-md-2 col-xl-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="{{ route('kategoris.create') }}" id="btn-add-contact" class="btn btn-primary d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Kategori
              </a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>ID</th>
                <th>Nama</th>
                <th>Action</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach ($kategoris as $kategori)
                <tr class="search-items">
                    <td>
                      <span class="usr-email-addr">{{ $kategori->id }}</span>
                    </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $kategori->nama }}</h6>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="usr-ph-no" data-phone="+1 (070) 123-4567">
                        <a href="{{ route('kategoris.edit', $kategori->id) }}" class="text-primary edit">
                            <i class="ti ti-pencil fs-5"></i></a>
                        <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" style="display:inline;">
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
