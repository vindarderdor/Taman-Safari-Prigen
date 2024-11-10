<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class testcontroller extends Controller
{
    public function index()
    {
        return view('management.users.test');
    }

    public function getUsersData(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                ->editColumn('email_verified_at', function($row) {
                    return $row->email_verified_at ? $row->email_verified_at->format('Y-m-d H:i:s') : 'Not Verified';
                })
                ->make(true);
        }
    }
}
