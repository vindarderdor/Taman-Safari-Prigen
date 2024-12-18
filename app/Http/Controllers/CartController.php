<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Content;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('content')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('content.cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:contents,ID_KONTEN',
            'adult_quantity' => 'required|integer|min:0',
            'child_quantity' => 'required|integer|min:0',
            'booking_date' => 'required|date|after_or_equal:today'
        ]);

        if ($request->adult_quantity + $request->child_quantity === 0) {
            return redirect()->back()->with('error', 'Please select at least one ticket.');
        }

        $content = Content::findOrFail($request->ticket_id);
        
        // Parse the booking date and ensure it's in UTC
        $bookingDate = Carbon::parse($request->booking_date)->startOfDay()->utc();

        if ($request->adult_quantity > 0) {
            CartItem::create([
                'user_id' => Auth::id(),
                'content_id' => $content->ID_KONTEN,
                'quantity' => $request->adult_quantity,
                'booking_date' => $bookingDate,
                'ticket_type' => 'adult',
                'price' => $content->HARGA_ADULT
            ]);
        }

        if ($request->child_quantity > 0) {
            CartItem::create([
                'user_id' => Auth::id(),
                'content_id' => $content->ID_KONTEN,
                'quantity' => $request->child_quantity,
                'booking_date' => $bookingDate,
                'ticket_type' => 'child',
                'price' => $content->HARGA_CHILD
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Items added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $newQuantity = max(0, $cartItem->quantity + $request->quantity);

        if ($newQuantity === 0) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        }

        return response()->json(['success' => true]);
    }

    public function remove($id)
    {
        CartItem::destroy($id);

        return response()->json(['success' => true]);
    }
}

