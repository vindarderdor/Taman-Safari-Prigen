<?php

namespace App\Http\Controllers;

use App\Models\ChildMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserActivity;
use App\Models\Menu;

class AuthController extends Controller
{
    public function landing()
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        $bukus = DB::table('bukus')->get();
        return view('index', ['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'bukus' => $bukus]);

    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $validate =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended('landing-page');
        }
        Session::flash('failed','Account not found');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        return view('dashboard', ['setting_menu_user' => $setting_menu_user]);
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'username' => 'required|string|max:60|unique:users,USERNAME',
            'email' => 'required|string|email|max:100|unique:users,EMAIL',
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::table('users')->insert([
            'NAMA_USER' => $request->input('name'),
            'USERNAME' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'ID_JENIS_USER' => 2,
            'STATUS_USER' => 'active',
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }
}
