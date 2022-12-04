<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use App\Models\Customers;
class UserController extends Controller
{
    public function login(){
        return view('admin.account');
    }

    public function postlogin(Request $req){
        $email    = $req->loginMail;
        $password = $req->loginPass;
        if(Auth::guard('admins')->attempt(['email' => $email, 'password' => $password])){
            dd(Auth::guard('admins')->user());
            return redirect()->route('admin.home');
        }
        // dd(Auth::guard('customers')->attempt(['email' => $email, 'password' => $password]));
    }

    public function logout(){
        Auth::guard('admins')->logout();
        Auth::guard('customers')->logout();
        return redirect()->route('user.home');
    }
}
