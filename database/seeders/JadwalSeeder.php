<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        foreach ($days as $day) {
            DB::table('jadwals')->insert([
                'HARI' => $day,
                'JAM_BUKA' => '09:00:00',
                'JAM_TUTUP' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}