<div class="container">
    <h1>Informasi Cuaca</h1>

    @if($cuaca)
        <div class="weather-info">
            <p><strong>Waktu UTC:</strong> {{ $cuaca['utc_datetime'] }}</p>
            <p><strong>Waktu Lokal:</strong> {{ $cuaca['local_datetime'] }}</p>
            <p><strong>Suhu Udara:</strong> {{ $cuaca['t'] }} °C</p>
            <p><strong>Kelembapan Udara:</strong> {{ $cuaca['hu'] }} %</p>
            <p><strong>Kondisi Cuaca:</strong> {{ $cuaca['weather_desc'] }}</p>
            <p><strong>Kondisi Cuaca (EN):</strong> {{ $cuaca['weather_desc_en'] }}</p>
            <p><strong>Kecepatan Angin:</strong> {{ $cuaca['ws'] }} km/jam</p>
            <p><strong>Arah Angin:</strong> {{ $cuaca['wd'] }}</p>
            <p><strong>Tutupan Awan:</strong> {{ $cuaca['tcc'] }} %</p>
            <p><strong>Jarak Pandang:</strong> {{ $cuaca['vs_text'] }}</p>
            <p><strong>Waktu Analisis:</strong> {{ $cuaca['analysis_date'] }}</p>
        </div>
    @else
        <p>Data cuaca tidak tersedia.</p>
    @endif
</div>
