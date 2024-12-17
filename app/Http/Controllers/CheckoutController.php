<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Transaksi;
use App\Models\PurchasedTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function process(Request $request)
    {
        $cartItems = CartItem::where('user_id', Auth::user()->ID_USER)->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $transaksi = Transaksi::create([
            'ID_USER' => Auth::user()->ID_USER,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);


        $params = [
            'transaction_details' => [
                'order_id' => $transaksi->id, 
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->NAMA_USER,
                'email' => Auth::user()->email,
            ],
            'item_details' => $cartItems->map(function ($item) {
                return [
                    'id' => $item->content_id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'name' => $item->content->TITLE . ' (' . ucfirst($item->ticket_type) . ')',
                ];
            })->toArray(),
        ];

        $snapToken = Snap::getSnapToken($params);

        $transaksi->snap_token = (string) $snapToken;
        $transaksi->save();

        return redirect()->route('checkout.show', ['transaksi' => $transaksi->id]);
    }

    private function generateTicketNumber($content)
    {
        $prefix = strtoupper(substr($content->TITLE, 0, 3));
        $uniqueNumber = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        return $prefix . $uniqueNumber;
    }

    public function show($id)
    {
        $cartItems = CartItem::with('content')->get();
        $transaksi = Transaksi::findOrFail($id);

        return view('content.transaksi.show', compact('transaksi', 'cartItems'));
    }

    public function success($id)
    {
        $cartItems = CartItem::where('user_id', Auth::user()->ID_USER)->get();
        $transaksi = Transaksi::findOrFail($id);

        // if ($transaksi->ID_USER !== Auth::user()->ID_USER) {
        //     abort(403);
        // }

        foreach ($cartItems as $item) {
            $ticketNumber = $this->generateTicketNumber($item->content);
            
            PurchasedTicket::create([
                'user_id' => Auth::user()->ID_USER,
                'content_id' => $item->content_id,
                'transaksi_id' => $transaksi->id,
                'ticket_type' => $item->ticket_type,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'booking_date' => $item->booking_date,
                'ticket_number' => $ticketNumber,
            ]);
        }
        $transaksi->status = 'success';
        $transaksi->save();

        // Clear the cart
        CartItem::where('user_id', Auth::user()->ID_USER)->delete();

        return view('content.transaksi.succes', compact('transaksi'));
    }

    public function failed($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // if ($transaksi->ID_USER !== Auth::user()->ID_USER) {
        //     abort(403);
        // }

        $transaksi->status = 'failed';
        $transaksi->save();

        return view('content.transaksi.failed', compact('transaksi'));
    }
}