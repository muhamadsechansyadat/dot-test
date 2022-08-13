<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        // dd($request->all());
        $email = $request->email ?? '';
        $password = $request->password ?? '';
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('merk.index');
        }

        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.view');
    }
}
