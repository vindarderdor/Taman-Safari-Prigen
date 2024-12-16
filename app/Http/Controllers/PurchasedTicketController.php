<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\PurchasedTicket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PurchasedTicketController extends Controller
{
    public function index()
    {
        $purchasedTickets = PurchasedTicket::where('user_id', Auth::user()->ID_USER)
            ->with(['content', 'transaction'])
            ->orderBy('booking_date', 'asc')
            ->get();

            dd($purchasedTickets->whereNull('content'));

        return view('content.purchased_ticket.index', compact('purchasedTickets'));
    }

    public function download($id)
    {
        $purchasedTicket = PurchasedTicket::where('user_id', Auth::user()->ID_USER)
            ->with(['content', 'transaction', 'user'])
            ->findOrFail($id);

        $qrCode = base64_encode(QrCode::format('png')
            ->size(300)
            ->generate(route('ticket.verify', ['ticket' => $purchasedTicket->ticket_number])));

        $pdf = PDF::loadView('content.purchased_ticket.pdf', compact('purchasedTicket', 'qrCode'));
        
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('ticket-' . $purchasedTicket->ticket_number . '.pdf');
    }
}