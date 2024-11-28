@extends('pages.app')

@section('content')

    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Jadwal</h1>
            <nav aria-label="breadcrumb" class="animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="/landing-page">Home</a>
                    </li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Jadwal</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Visiting Hours Start -->
    <div class="container-xxl bg-primary visiting-hours my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.3s">
                    <h2 class="text-white mb-5">Jadwal</h2>
                    <ul class="list-group list-group-flush">
                        @foreach (['Senin' => '09:00 - 18:00', 'Selasa' => '09:00 - 18:00', 'Rabu' => '09:00 - 18:00', 'Kamis' => '09:00 - 18:00'] as $day => $hours)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $day }}</span>
                                <span>{{ $hours }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection