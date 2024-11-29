<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Tampilkan halaman keranjang
    public function index()
    {
        $cart = Session::get('cart', []); // Ambil keranjang dari sesi
        return view('content.cart.index', compact('cart'));
    }

    // Tambahkan tiket ke keranjang
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);

        $id = $request->id;
        if (isset($cart[$id])) {
            // Jika tiket sudah ada, tambahkan jumlah
            $cart[$id]['jumlah'] += $request->jumlah;
        } else {
            // Jika tiket belum ada, tambahkan tiket baru
            $cart[$id] = [
                'id' => $id,
                'title' => $request->title,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
            ];
        }

        Session::put('cart', $cart); // Simpan ke sesi
        return redirect()->route('cart.index')->with('success', 'Tiket berhasil ditambahkan ke keranjang!');
    }

    // Update jumlah tiket di keranjang
    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] = $request->jumlah; // Perbarui jumlah
        }

        Session::put('cart', $cart);
        return back()->with('success', 'Jumlah tiket berhasil diperbarui!');
    }

    // Hapus tiket dari keranjang
    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        unset($cart[$id]); // Hapus tiket dari sesi

        Session::put('cart', $cart);
        return back()->with('success', 'Tiket berhasil dihapus dari keranjang!');
    }
}