<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class ManagementController extends Controller
{
    // 1. Menampilkan Semua Users
    public function indexUser(Request $request)
    {
        $users = DB::table('users')
            ->join('JENIS_USER', 'users.ID_JENIS_USER', '=', 'JENIS_USER.ID_JENIS_USER')
            ->select('users.*', 'JENIS_USER.JENIS_USER')
            ->where('users.DELETE_MARK', '!=', '1')
            ->get();
        $roles = DB::table('JENIS_USER')->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('management.users.index_content', compact('users'))->render()
            ]);
        }

        return view('management.users.index', compact('users', 'roles'));
    }
    public function createUser()
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $roles = DB::table('JENIS_USER')->get();
        return view('management.users.create', ['roles' => $roles, 'setting_menu_user' => $setting_menu_user]);
    }

    public function storeUser(Request $request)
    {
        $id = DB::table('users')->insertGetId([
            'NAMA_USER' => $request->input('name'),
            'EMAIL' => $request->input('email'),
            'PASSWORD' => bcrypt($request->input('password')),
            'ID_JENIS_USER' => $request->input('role'),
            'CREATE_BY' => auth()->user()->USERNAME,
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0'
        ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'User added successfully']);
        }

        return redirect()->route('management.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id)
    {
        $user = DB::table('users')->where('ID_USER', $id)->first();

        if (request()->ajax()) {
            return response()->json($user);
        }

        $roles = DB::table('JENIS_USER')->get();
        return view('management.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function updateUser(Request $request, $id)
    {
        DB::table('users')
            ->where('ID_USER', $id)
            ->update([
                'NAMA_USER' => $request->input('name'),
                'EMAIL' => $request->input('email'),
                'ID_JENIS_USER' => $request->input('role'),
                'UPDATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now()
            ]);

        if ($request->ajax()) {
            return response()->json(['message' => 'User updated successfully']);
        }

        return redirect()->route('management.users.index')->with('success', 'User berhasil diupdate.');
    }

    public function deleteUser($id)
    {
        DB::table('users')
            ->where('ID_USER', $id)
            ->update(['DELETE_MARK' => '1']);

        if (request()->ajax()) {
            return response()->json(['message' => 'User deleted successfully']);
        }

        return redirect()->route('management.users.index')->with('success', 'User berhasil dihapus.');
    }

    // --- Role Management (Jenis User) ---
    public function indexRole(Request $request)
    {

        $roles = DB::table('JENIS_USER')->where('DELETE_MARK', '!=', '1')->get();

        if ($request->ajax()) {
            return view('management.roles.index_content', compact('roles'));
        }

        return view('management.roles.index', compact('roles'));
    }

    public function createRole()
    {
        return view('management.roles.create', []);
    }

    public function storeRole(Request $request)
    {
        DB::table('JENIS_USER')->insert([
            'JENIS_USER' => $request->input('role_name'),
            'CREATE_BY' => auth()->user()->USERNAME,
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0'
        ]);

        return redirect()->route('dashboard')->with('success', 'Role berhasil ditambahkan.');
    }
    public function editRole($id)
    {
        $role = DB::table('JENIS_USER')->where('ID_JENIS_USER', $id)->first();

        if (!$role) {
            return redirect()->route('dashboard')->with('error', 'Role not found.');
        }

        return view('management.roles.edit', ['role' => $role, ]);
    }

    public function updateRole(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|max:60',
        ]);

        DB::table('JENIS_USER')
            ->where('ID_JENIS_USER', $id)
            ->update([
                'JENIS_USER' => $validatedData['role_name'],
                'CREATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Role updated successfully.');
    }
    public function deleteRole($id)
    {
        DB::table('JENIS_USER')
            ->where('ID_JENIS_USER', $id)
            ->update([
                'DELETE_MARK' => '1',
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Role deleted successfully.');
    }



    // --- Menu Management ---
    public function indexMenu(Request $request)
    {

        $menus = DB::table('MENU')->where('DELETE_MARK', '!=', '1')->get();

        if ($request->ajax()) {
            return view('management.menus.index_content', compact('menus'));
        }

        return view('management.menus.index', compact('menus'));
    }

    public function createMenu()
    {
        return view('management.menus.create', []);
    }

    public function storeMenu(Request $request)
    {
        DB::table('MENU')->insert([
            'MENU_NAME' => $request->input('menu_name'),
            'MENU_LINK' => $request->input('menu_link'),
            'PARENT_ID' => $request->input('parent_id'),
            'CREATE_BY' => auth()->user()->USERNAME,
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0'
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil ditambahkan.');
    }
    public function editmenu($id)
    {
        // Ambil data menu berdasarkan ID
        $menu = DB::table('MENU')->where('ID_MENU', $id)->first();

        // Cek apakah menu ditemukan
        if (!$menu) {
            return redirect()->route('management.menus.index')->with('error', 'Menu tidak ditemukan.');
        }

        // Tampilkan halaman edit dengan data menu
        return view('management.menus.edit', ['menu' => $menu]);
    }

    public function updatemenu(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'menu_name' => 'required|string|max:60',
            'menu_link' => 'required|string|max:300',
        ]);

        // Update data di tabel MENU
        DB::table('MENU')
            ->where('ID_MENU', $id)
            ->update([
                'MENU_NAME' => $request->input('menu_name'),
                'MENU_LINK' => $request->input('menu_link'),
                'PARENT_ID' => $request->input('parent_id'),
                'UPDATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil diupdate.');
    }

    // Method untuk delete menu (soft delete)
    public function deletemenu($id)
    {
        // Soft delete dengan mengubah DELETE_MARK menjadi '1'
        DB::table('MENU')
            ->where('ID_MENU', $id)
            ->update([
                'DELETE_MARK' => '1',
                'UPDATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil dihapus.');
    }
    // --- SubMenu Management ---
    public function indexsubMenu(Request $request)
    {
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();

        if ($request->ajax()) {
            return view('management.submenus.index_content', compact('submenus'));
        }
        return view('management.submenus.index', ['submenus' => $submenus, ]);
    }

    public function createsubMenu()
    {
        return view('management.submenus.create', []);
    }

    public function storesubMenu(Request $request)
    {
        DB::table('MENU_LEVEL')->insert([
            'LEVEL' => $request->input('menu_level'),
            'MENU_NAME' => $request->input('menu_name'),
            'MENU_LINK' => $request->input('menu_link'),
            'CREATE_BY' => auth()->user()->USERNAME,
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0'
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil ditambahkan.');
    }
    public function editsubmenu($id)
    {
        // Ambil data menu berdasarkan ID
        $submenu = DB::table('MENU_LEVEL')->where('ID_LEVEL', $id)->first();

        // Cek apakah menu ditemukan
        if (!$submenu) {
            return redirect()->route('management.submenus.index')->with('error', 'Menu tidak ditemukan.');
        }

        // Tampilkan halaman edit dengan data menu
        return view('management.submenus.edit', ['submenu' => $submenu]);
    }

    public function updatesubmenu(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'menu_level' => 'required|string|max:60',
            'menu_name' => 'required|string|max:60',
            'menu_link' => 'required|string|max:300',
        ]);

        // Update data di tabel MENU
        DB::table('MENU_LEVEL')
            ->where('ID_LEVEL', $id)
            ->update([
                'LEVEL' => $request->input('menu_level'),
                'MENU_NAME' => $request->input('menu_name'),
                'MENU_LINK' => $request->input('menu_link'),
                'UPDATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil diupdate.');
    }

    // Method untuk delete menu (soft delete)
    public function deletesubmenu($id)
    {
        // Soft delete dengan mengubah DELETE_MARK menjadi '1'
        DB::table('MENU_LEVEL')
            ->where('ID_LEVEL', $id)
            ->update([
                'DELETE_MARK' => '1',
                'UPDATE_BY' => auth()->user()->USERNAME,
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil dihapus.');
    }

    public function indexsetting(Request $request)
    {

        $settings = DB::table('SETTING_MENU_USER')
            ->join('JENIS_USER', 'SETTING_MENU_USER.ID_JENIS_USER', '=', 'JENIS_USER.ID_JENIS_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.DELETE_MARK', '0')
            ->select('SETTING_MENU_USER.NO_SETTING', 'JENIS_USER.JENIS_USER', 'MENU.MENU_NAME')
            ->get();

        if ($request->ajax()) {
            return view('management.settings.index_content', compact('settings'));
        }

        return view('management.settings.index', compact('settings'));
    }

    // Create: Menampilkan form untuk membuat setting baru
    public function createsetting()
    {
        // Ambil data jenis user dan menu untuk digunakan dalam select options
        $roles = DB::table('JENIS_USER')->get();
        $menus = DB::table('MENU')->get();

        return view('management.settings.create', [
            'roles' => $roles,
            'menus' => $menus,
        ]);
    }

    // Store: Menyimpan setting baru ke database
    public function storesetting(Request $request)
    {
        // Validasi input
        $request->validate([
            'role' => 'required|integer',
            'menu' => 'required|integer',
        ]);

        // Insert ke tabel SETTING_MENU_USER
        DB::table('SETTING_MENU_USER')->insert([
            'ID_JENIS_USER' => $request->role,
            'MENU_ID' => $request->menu,
            'CREATE_BY' => auth()->user()->USERNAME, // Atau nama field sesuai dengan model user
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0',
        ]);

        return redirect()->route('dashboard')->with('success', 'Setting berhasil ditambahkan');
    }

    // Delete: Menghapus setting berdasarkan ID
    public function deletesetting($id)
    {
        // Soft delete dengan mengubah DELETE_MARK menjadi '1'
        DB::table('SETTING_MENU_USER')
            ->where('NO_SETTING', $id)
            ->update([
                'DELETE_MARK' => '1',
                'UPDATE_BY' => auth()->user()->username, // Atur user yang melakukan update
                'UPDATE_DATE' => now(),
            ]);

        return redirect()->route('dashboard')->with('success', 'Setting berhasil dihapus');
    }
}
