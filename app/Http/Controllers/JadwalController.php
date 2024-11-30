<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('content.jadwal.index', compact('jadwals'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('content.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'JAM_BUKA' => 'required|date_format:H:i',
            'JAM_TUTUP' => 'required|date_format:H:i|after:JAM_BUKA',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->only(['JAM_BUKA', 'JAM_TUTUP']));

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui');
    }
}