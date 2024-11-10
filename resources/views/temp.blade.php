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
        <div class="container mx-auto px-4 py-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold mb-4">Prakiraan Cuaca {{ $city }}</h1>

                <!-- Form pencarian kota -->
                <form action="{{ url('/weather') }}" method="GET" class="mb-6">
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

                <!-- Cuaca saat ini -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Cuaca Saat Ini</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-4xl font-bold">{{ round($current_weather['main']['temp']) }}°C</p>
                            <p class="text-gray-600">Terasa seperti {{ round($current_weather['main']['feels_like']) }}°C</p>
                        </div>
                        <div>
                            <p>Kelembaban: {{ $current_weather['main']['humidity'] }}%</p>
                            <p>Kecepatan Angin: {{ round($current_weather['wind']['speed'] * 3.6, 1) }} km/jam</p>
                        </div>
                    </div>
                </div>

                <!-- Prakiraan 7 hari -->
                <h2 class="text-xl font-semibold mb-4">Prakiraan 7 Hari Kedepan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach($daily_forecast as $forecast)
                    <div class="bg-white rounded-lg shadow-md p-4">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
