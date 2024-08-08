<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class B_LoginController extends Controller
{
    
    public function create(){
        return view('backend.dashboard.layout.login');
    }
    public function login(Request $request){
        $request->validate([
            "email"=>"required|email:rfc,dns|string|max:255",
            "password"=>"required|min:8|max:255"

        ]);
        $credentials = $request->only('email','password');
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/Back-end/dashboard');
        }
        return 0;
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    
}
