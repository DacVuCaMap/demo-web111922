<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function home(){
        return view('admin.home');
    }

    public function account(){
        return view('admin.account');
    }

    public function postaccount(Request $req){

    }
    public function register(){
        return view('admin.register');
    }


}
