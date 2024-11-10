@extends('content.app')

@section('content')

    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Cuaca</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Cuaca</li>
            </ol>
        </nav>
        </div>
    </div>
        <!-- Modal -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <img class="card-img-top" src="{{ asset('') }}landing/assets/images/backgrounds/weather.jpg" alt="Card image cap" height="450"
                  />
                <div class="card-img-overlay">
                  <div class="text-white">
                    <span><i class="ti ti-sun-high display-4"></i></span>
                    <br />
                    <span class="display-6">{{ round($current_weather['main']['temp']) }}°
                      <span class="fs-6">C</span>
                    </span>
                    {{-- <p class="fs-3 mb-0">THURSDAY 01.08.2018</p> --}}
                  </div>
                </div>
                <div class="card-footer text-bg-white">
                  <div class="row">
                    <div class="col-12">
                      <div class="row text-center">
                        @foreach($daily_forecast as $forecast)
                        <div class="col-6 col-md-2 border-end">
                            <div class="mb-2">{{ $forecast['formatted_date'] }}</div>
                            <img src="http://openweathermap.org/img/w/{{ $forecast['icon'] }}.png"
                                 alt="{{ $forecast['description'] }}"
                                 class="mx-auto">
                            <p class="text-2xl font-bold">{{ $forecast['temp'] }}°C</p>
                          </div>
                        {{-- <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="text-center">
                                <h3 class="font-semibold">{{ $forecast['formatted_date'] }}</h3>
                                <img src="http://openweathermap.org/img/w/{{ $forecast['icon'] }}.png"
                                    alt="{{ $forecast['description'] }}"
                                    class="mx-auto">
                                <p class="text-2xl font-bold">{{ $forecast['temp'] }}°C</p>
                                <p class="text-gray-600">{{ $forecast['description'] }}</p>
                                <div class="mt-2 text-sm">
                                    <p>Kelembaban: {{ $forecast['humidity'] }}%</p>
                                    <p>Angin: {{ $forecast['wind_speed'] }} km/jam</p>
                                </div>
                            </div>
                        </div> --}}
                        @endforeach
                        {{-- <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">TUE</div>
                          <i class="ti ti-cloud fs-7 mb-2"></i>
                          <div>
                            24°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">WED</div>
                          <i class="ti ti-cloud fs-7 mb-2"></i>
                          <div>
                            21°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">THU</div>
                          <i class="ti ti-sun-high fs-7 mb-2"></i>
                          <div>
                            25°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">FRI</div>
                          <i class="ti ti-cloud-fog fs-7 mb-2"></i>
                          <div>
                            20°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">SAT</div>
                          <i class="ti ti-cloud-storm fs-7 mb-2"></i>
                          <div>
                            18°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2">
                          <div class="mb-2">SUN</div>
                          <i class="ti ti-cloud-rain fs-7 mb-2"></i>
                          <div>
                            14°
                            <span>C</span>
                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                <form action="{{ url('/cuaca') }}" method="GET" class="mb-6">
                    <div class="flex gap-2">
                        <input type="text"
                               name="city"
                               value="{{ $city }}"
                               placeholder="Masukkan nama kota"
                               class="px-4 py-2 border rounded-lg flex-1">
                        <button type="submit"
                                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Cari
                        </button>
                    </div>
                </form>

@endsection
