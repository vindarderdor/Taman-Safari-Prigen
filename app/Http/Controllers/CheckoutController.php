<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Transaksi;
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

        foreach ($cartItems as $item) {
            $item->transaksi_id = $transaksi->id;
            $item->save();
        }

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

        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        return redirect()->route('checkout.show', ['transaksi' => $transaksi->id]);
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // dd([
        //     'transaksi_user_id' => $transaksi->ID_USER,
        //     'transaksi_id' => $transaksi->id,
        //     'auth_user_id' => Auth::user()->ID_USER,
        // ]);
    
        // if ($transaksi->ID_USER !== Auth::user()->ID_USER) {
        //     abort(403);
        // }

        return view('content.transaksi.show', compact('transaksi'));
    }

    public function success($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // if ($transaksi->ID_USER !== Auth::user()->ID_USER) {
        //     abort(403);
        // }

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