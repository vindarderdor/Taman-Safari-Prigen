@extends('content.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Gempa</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Gempa</li>
            </ol>
        </nav>
        </div>
    </div>
        <!-- Modal -->
        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Magnitudo</th>
                <th>Kedalaman</th>
                <th>Wilayah</th>
              </thead>
              <tbody>
                <!-- start row -->
                @foreach ($earthquakes as $earthquake)
                <tr class="search-items">
                    <td>
                      <span class="usr-email-addr">{{ $earthquake['Tanggal'] }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $earthquake['Jam'] }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $earthquake['Magnitude'] }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $earthquake['Kedalaman'] }}</span>
                    </td>
                    <td>
                      <span class="usr-email-addr">{{ $earthquake['Wilayah'] }}</span>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection
