<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    private $pro;
    public function __construct()
    {
        $this->pro=new Product();
    }
    public function homepage(){
        return view('home_byNamVu.home');
    }
    public function shop(){
        $data=$this->pro->getAll();
        

        return view('home_byNamVu.shop',compact('data'));
    }
    public function floppydisk(){
        return view('home_byNamVu.floppydisk');
    }
    public function test(){
        return view('home_byNamVu.test');
    }
    public function getProduct($id){
        $data=$this->pro->getP($id);
        $data=$data[0];
        // dd($data);

        return view('home_byNamVu.product',compact('data'));
        
    }
}
