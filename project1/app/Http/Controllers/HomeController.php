<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(){
        return view('home_byNamVu.home');
    }
    public function shop(){
        return view('home_byNamVu.shop');
    }
}
