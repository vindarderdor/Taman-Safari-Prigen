<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        $bukus = Buku::with('kategori')->get();
        return view('content.bukus.index',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'bukus' => $bukus]);
    }

    public function create()
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        $kategoris = Kategori::all();
        return view('content.bukus.create',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'kategoris' => $kategoris]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'kategori_id' => 'required',
    //         'kode' => 'required|string|max:255',
    //         'judul' => 'required|string|max:255',
    //         'pengarang' => 'required|string|max:255',
    //     ]);

    //     Buku::create($request->all());

    //     return view('content.bukus.index');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('public/images/buku'); // Menyimpan gambar di storage
            $data['gambar'] = $path;
        }

        Buku::create($data);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan.');
    }
    public function edit(Buku $buku)
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        $kategoris = Kategori::all();

        return view('content.bukus.edit',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'kategoris' => $kategoris, 'buku' => $buku]);
    }
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $data = $request->only(['judul', 'kode', 'pengarang', 'kategori_id']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('public/images/buku');
            $data['gambar'] = $path;
        }

        $buku->update($data);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.');
    }


}
