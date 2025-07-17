<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username   = $request->username;
        $pwd   = $request->pwd;
        if (Auth::guard('web')->attempt(['username' => $username, 'password' => $pwd])) {
            $role = Auth::user()->role;
          
            if ($role == 3 || $role == 0) {
                return response()->json('nonmanajemen');
            } else if ($role == 4 || $role == 2) {
                return response()->json('manajemenrs');
            } else if ($role == 5) {
                return response()->json('manajemennmu');
            }
            else if ($role == 6) {
                return response()->json('kasir');
            }else {
                return view('login');
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
