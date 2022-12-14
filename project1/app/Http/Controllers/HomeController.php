<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
    public function getProduct($id,Request $req){
        
        $data=$this->pro->getP($id);
        $data=$data[0];
        if($req->ajax()){
            $rs=$this->pro->addtoCart($req->prod);
            session()->put('cart',$rs);
            return response()->json($rs);
        }
       
        return view('home_byNamVu.product',compact('data'));
        
    }
   public function cart(){
    
    dd(session()->all());
    return view('home_byNamVu.cart');
   }

    
   
}
