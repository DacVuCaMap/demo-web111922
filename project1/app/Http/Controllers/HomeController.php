<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
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

        if (Auth::guard('customers')->check()==0) {
            session()->put('link',url()->current());
        }
        $data=$this->pro->getP($id);
        $data=$data[0];
        $cusid=Auth::guard('customers')->id();
        if($req->ajax()){

            $rs=$this->pro->addtoCart($req->prod,$cusid);
            $tot=$this->pro->nbrcart($cusid);
            session()->put('cart',$tot);
            return response()->json($tot);
        }
       //
        return view('home_byNamVu.product',compact('data'));

    }
   public function cart(){

        $cusid=Auth::guard('customers')->id();
        $data=$this->pro->cartdata($cusid);

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
        $tot=$this->pro->nbrcart($cus_id);
        session()->put('cart',$tot);
        return redirect()->back();
   }
   //order
   public function order($cus_id){
        $orders = DB::select("SELECT * from orders Where cus_id = ?", [$cus_id]);
        // dd($orders);
        return view('home_byNamVu.orderinfo', compact('orders'));
   }

   //search
   public function search(Request $req){

        if ($req->ajax()) {
            $key=$req->search;
            if (strlen($key)>1) {
                $rs=$this->pro->search_pro($key);
                $output='';

                for ($i=0; $i <count($rs) ; $i++) {
                    $output .='<a style="text-decoration: none" href="/shop/product/'.$rs[$i]->id.'">
                    <div class="cardsearch">
                    <div>
                        <img src="'.$rs[$i]->img_first.'" alt="" height="100px">
                        </div>
                        <div class="propertisesearch">
                            <h2>'.$rs[$i]->pro_name.'</h2>
                            <p>Category: '.$rs[$i]->name.'</p>
                            <p>Price: '.$rs[$i]->pro_price.'$</p>
                        </div>
                    </div>
                    </a>';
                }
                if ($output=='') {
                    return false;
                }
                return response()->json($output);
            }

        }
   }


}
