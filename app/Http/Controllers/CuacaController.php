<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CuacaController extends Controller
{
    public function show($kode_wilayah)
    {
        $url = "https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4={$kode_wilayah}";

        $response = Http::withOptions([
            'verify' => false,
        ])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            dd($data);
            // Akses data cuaca dari array yang lebih dalam
            $cuacaData = $data['data'][0]['cuaca'][0][0] ?? null;

            if ($cuacaData) {
                $cuaca = [
                    'utc_datetime' => $cuacaData['utc_datetime'] ?? 'N/A',
                    'local_datetime' => $cuacaData['local_datetime'] ?? 'N/A',
                    't' => $cuacaData['t'] ?? 'N/A',
                    'hu' => $cuacaData['hu'] ?? 'N/A',
                    'weather_desc' => $cuacaData['weather_desc'] ?? 'N/A',
                    'weather_desc_en' => $cuacaData['weather_desc_en'] ?? 'N/A',
                    'ws' => $cuacaData['ws'] ?? 'N/A',
                    'wd' => $cuacaData['wd_deg'] ?? 'N/A',
                    'tcc' => $cuacaData['tcc'] ?? 'N/A',
                    'vs_text' => $cuacaData['vs_text'] ?? 'N/A',
                    'analysis_date' => $cuacaData['analysis_date'] ?? 'N/A',
                ];

                return view('cuaca.show', ['cuaca' => $cuaca]);
            }
        }

        return redirect()->back()->withErrors('Gagal mengambil data cuaca.');
    }

}
