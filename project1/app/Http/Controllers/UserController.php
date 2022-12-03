<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('admin.account');
    }

    public function postlogin(Request $req){
        $email    = $req->loginMail;
        $password = $req->loginPass;
        dd(bcrypt('minh123'));

    }
}
