<?php

namespace App\Http\Controllers;

use App\Models\OrderTiket;
use App\Models\Midtrans;
use Illuminate\Http\Request;
use Midtrans\Snap;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'ID_JADWAL' => 'required|exists:jadwals,ID_JADWAL',
            'JUMLAH' => 'required|integer|min:1',
        ]);

        // Hitung total harga
        $hargaPerTiket = 50000;
        $totalHarga = $validated['JUMLAH'] * $hargaPerTiket;

        // Buat order tiket
        $orderTiket = OrderTiket::create([
            'ID_USER' => auth()->id(),
            'ID_JADWAL' => $validated['ID_JADWAL'],
            'JUMLAH' => $validated['JUMLAH'],
            'TOTAL_HARGA' => $totalHarga,
            'payment_status' => 'pending'
        ]);

        // Buat transaksi Midtrans
        $transactionDetails = [
            'transaction_details' => [
                'order_id' => 'TICKET-'.$orderTiket->ID_TIKET.'-'.time(),
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->NAMA_USER,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->NO_HP,
            ],
            'item_details' => [
                [
                    'id' => $orderTiket->ID_JADWAL,
                    'price' => $hargaPerTiket,
                    'quantity' => $validated['JUMLAH'],
                    'name' => 'Tiket Event'
                ]
            ]
        ];

        try {
            // Dapatkan Snap Token
            $snapToken = Snap::getSnapToken($transactionDetails);

            // Simpan data transaksi
            $midtrans = Midtrans::create([
                'ID_TIKET' => $orderTiket->ID_TIKET,
                'TRANSACTION_ID' => $transactionDetails['transaction_details']['order_id'],
                'GROSS_AMOUNT' => $totalHarga,
                'STATUS' => 'pending'
            ]);

            return view('tickets.payment', compact('snapToken', 'orderTiket'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function payment($id)
    {
        $orderTiket = OrderTiket::findOrFail($id);
        return view('tickets.payment', compact('orderTiket'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if($hashed == $request->signature_key){
            // Extract order ID from Midtrans order ID format (TICKET-{ID}-{TIMESTAMP})
            $orderId = explode('-', $request->order_id)[1];
            
            // Update order status
            $order = OrderTiket::find($orderId);
            if ($order) {
                // Update order status based on transaction status
                switch($request->transaction_status) {
                    case 'capture':
                    case 'settlement':
                        $order->payment_status = 'paid';
                        break;
                    case 'pending':
                        $order->payment_status = 'pending';
                        break;
                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $order->payment_status = 'failed';
                        break;
                }
                $order->save();

                // Update Midtrans transaction record
                $midtrans = Midtrans::where('ID_TIKET', $orderId)->first();
                if ($midtrans) {
                    $midtrans->update([
                        'TRANSACTION_STATUS' => $request->transaction_status,
                        'PAYMENT_TYPE' => $request->payment_type,
                        'TRANSACTION_TIME' => $request->transaction_time,
                        'FRAUD_STATUS' => $request->fraud_status ?? null
                    ]);
                }

                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['status' => 'error']);
    }

    public function success()
    {
        return view('tickets.success');
    }

    public function pending()
    {
        return view('tickets.pending');
    }

    public function error()
    {
        return view('tickets.error');
    }

    public function cancel()
    {
        return view('tickets.cancel');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id); // Cari tiket berdasarkan ID
        return view('content.pesan.detail', compact('ticket'));
    }
}