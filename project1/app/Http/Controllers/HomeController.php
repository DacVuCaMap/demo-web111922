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
        session()->flush();
        return view('home_byNamVu.test');
    }
    public function getProduct($id,Request $req){
        
        $data=$this->pro->getP($id);
        $data=$data[0];
        if($req->ajax()){
            
            $rs=$this->pro->addtoCart($req->prod,$req->userid);
            session()->put('cart',$rs);
            return response()->json($rs);
        }
       //
        return view('home_byNamVu.product',compact('data'));

    }
   public function cart(){
    
    $data=$this->pro->cartdata();
    return view('home_byNamVu.cart',compact('data'));
   }
   public function postcart(Request $req){
    $data=$req->all();
    $user_id=$data['user_id'];
    
    $updata=[];
    $pro_id=[];
    $count=(count($data)-2)/2;
    for ($i=0; $i < $count ; $i++) { 
        array_push($updata,$data[$i]);
        array_push($pro_id,$data['p'.$i]);
    }
    $this->pro->upcartdata($updata,$pro_id,$user_id);
    return redirect()->route('user.orderinfo');
   }
   //del cart
   public function delcart($pro_id,$cus_id){
    $this->pro->deletecart($pro_id,$cus_id);
    return redirect()->back();
   }
   //order
   public function order(){
    return view('home_byNamVu.orderinfo');
   }


}
