<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{


    public function home(){
        return view('admin.home');
    }

    public function login(){
        return view('admin.login');
    }

    public function postlogin(Request $req){

    }


}
