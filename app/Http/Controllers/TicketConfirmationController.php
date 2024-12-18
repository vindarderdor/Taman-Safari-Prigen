<?php

namespace App\Http\Controllers;

use App\Models\PurchasedTicket;
use Illuminate\Http\Request;

class TicketConfirmationController extends Controller
{
    public function show($ticketNumber)
    {
        $ticket = PurchasedTicket::where('ticket_number', $ticketNumber)->firstOrFail();
        return view('content.ticket_confirmation.show', compact('ticket'));
    }

    public function confirm($ticketNumber)
    {
        $ticket = PurchasedTicket::where('ticket_number', $ticketNumber)->firstOrFail();

        if ($ticket->status === 'used') {
            return back()->with('error', 'This ticket has already been used.');
        }

        $ticket->status = 'used';
        $ticket->save();

        return back()->with('success', 'Ticket has been successfully confirmed and marked as used.');
    }
}

