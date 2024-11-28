<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class PesanController extends Controller
{
    public function index()
    {
        $tikets = Content::all();
        return view('content.pesan.index', compact('tikets'));
    }
}
