<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class PagesController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('pages.index', compact('jadwals'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function jadwal()
    {
        $jadwals = Jadwal::all();
        return view('pages.jadwal', compact('jadwals'));
    }
}
