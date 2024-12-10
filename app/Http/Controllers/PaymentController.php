<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Midtrans server key
        Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function index()
    {
        $cartItems = CartItem::with('content')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->content->HARGA * $item->quantity;
        });

        return view('payment.index', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $cartItems = CartItem::with('content')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->content->HARGA * $item->quantity;
        });

        $transaction_details = [
            'order_id' => 'ORDER-' . time(),
            'gross_amount' => $total,
        ];

        $item_details = [];

        foreach ($cartItems as $item) {
            $item_details[] = [
                'id' => $item->content->ID_KONTEN,
                'price' => $item->content->HARGA,
                'quantity' => $item->quantity,
                'name' => $item->content->TITLE,
            ];
        }

        $customer_details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
        ];

        try {
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            return redirect($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}