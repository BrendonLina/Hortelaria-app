<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('dashboard');
        }

        return view('login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('login');
    }
}
