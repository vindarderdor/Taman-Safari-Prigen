<?php

namespace App\Http\Controllers;

use App\Models\PurchasedTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $purchasedTickets = PurchasedTicket::where('user_id', Auth::user()->ID_USER)
            ->with(['content', 'transaction'])
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('content.dashboard.index', compact('purchasedTickets'));
    }
}

