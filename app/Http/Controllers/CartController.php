<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('content')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->content->HARGA * $item->quantity;
        });

        return view('content.cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        // Validate the request
        $request->validate([
            'ticket_id' => 'required|exists:contents,ID_KONTEN',
            'quantity' => 'required|integer|min:1'
        ]);
    
        // Find the content using the correct column name
        $content = Content::where('ID_KONTEN', $request->ticket_id)->firstOrFail();
        
        // Create or update cart item
        CartItem::updateOrCreate(
            ['content_id' => $content->ID_KONTEN],
            [
                'quantity' => DB::raw('COALESCE(quantity, 0) + ' . $request->quantity)
            ]
        );
    
        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = max(1, $cartItem->quantity + $request->quantity);
        $cartItem->save();

        return response()->json(['success' => true]);
    }

    public function remove($id)
    {
        CartItem::destroy($id);

        return response()->json(['success' => true]);
    }
}