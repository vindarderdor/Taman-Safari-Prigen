<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
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
        $kategoris = DB::table('kategoris')->get();
        return view('content.kategoris.index',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'kategoris' => $kategoris]);
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
        return view('content.kategoris.create',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());

        return view('layouts.main');
    }
    public function edit(kategori $kategori)
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        return view('content.kategoris.edit',['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'kategori' => $kategori]);
    }
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diperbarui.');
    }
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus.');
    }


}
