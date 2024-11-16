<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $schedules = Jadwal::latest()->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TANGGAL' => 'required|date',
            'JAM_BUKA' => 'required',
            'JAM_TUTUP' => 'required',
            'IS_OPEN' => 'required|boolean'
        ]);

        Jadwal::create($validated);

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Jadwal $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Jadwal $schedule)
    {
        $validated = $request->validate([
            'TANGGAL' => 'required|date',
            'JAM_BUKA' => 'required',
            'JAM_TUTUP' => 'required',
            'IS_OPEN' => 'required|boolean'
        ]);

        $schedule->update($validated);

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwal $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}