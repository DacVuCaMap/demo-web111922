<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orders;
use PDF;
use DB;
use App\Http\Resources\Order;
class OrderController extends Controller
{
    private $order;
    public function __construct(){
        $this->order = new Orders();
    }

    // tạo danh sách order
    public function list(Request $req){
        $key_select  = $req->key_select;
        $key_word = $req->key_word;
        $orders = $this->order->getorders($key_select, $key_word);
        return view('order.list', compact('orders'));
    }


    // tạo order chi tiết
    public function detail($id){
        $orderdetail = $this->order->getdetail($id);
        $order       = $this->order->getorder($id);
        $total       = $this->order->totalorder($id);
        return view('order.detail', compact('orderdetail', 'order','total'));
    }

    //update trạng thái thành complete
    public function editcpl(Request $req){
        if($req->ajax()){
            $ord_id = $req->ord_id;
            // return $ord_id;
            $data = [1, $ord_id];
            if($this->order->upstatus($data)==null){
                return 1;
            }else{
                return 0;
            };
        }


        // $data = [1, $id];
        // if($this->order->upstatus($data)==null){
        //     return redirect()->route('order.list')->with('msg', 'Update Order success!');
        // }else{
        //     return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        // };
    }
    // update trạng thái thành cancel
    public function editcacel(Request $req){

        if($req->ajax()){
            $ord_id = $req->ord_id;
            // return $ord_id;
            $data = [3, $ord_id];
            if($this->order->upstatus($data)==null){
                return 1;
            }else{
                return 0;
            };
        }

        // $data = [3, $id];
        // if($this->order->upstatus($data)==null){
        //     return redirect()->route('order.list')->with('msg', 'Update Order success!');
        // }else{
        //     return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        // };
    }

    public function print_order_convert($id){
        $orderdetail = $this->order->getdetail($id);
        $order       = $this->order->getorder($id);
        $total       = $this->order->totalorder($id);
        return view('order.detailPDF', compact('orderdetail', 'order','total'));
    }

    public function exportPDF($id){
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($this->print_order_convert($id));
       return $pdf->stream();
    }

    public function createorder(Request $req){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $cus_id      = $req->user_id;
            $orderID     = 'OD'.date('ymdHis', time()).'KH'.$cus_id;
            $ord_date    = now();
            $ord_status  = 2;
            $address     = $req->address;
            $methodpay   = $req->methodpay;
            $data        = [$orderID, $cus_id ,$ord_date, $ord_status,  $address, $methodpay];

            $Detail = DB::select("SELECT * from tblcart WHERE cus_id = ?", [$cus_id]);
            // $pro_st = [];
            foreach ($Detail as $item) {
                $pro = $item->pro_id;
                $status = DB::select('SELECT pro_status from product where id = ?', [$pro]);
                $status = $status[0]->pro_status;
                // array_push($pro_st,$status);
                if($status=="Out of stock"){
                    return redirect()->route('user.cart')->with('msg', 'Product '.$pro.' Out of stock');
                }
            }
        // insert vào orders
            $this->order->createorders($data);
        //insert orders Detail
            foreach ($Detail as $item){
                $pro_id    = $item->pro_id;
                $pro_price = $item->pro_price;
                $quantity  = $item->quantity;
                $data = [$orderID, $pro_id,$pro_price,$quantity];
                $this->order->createorderDetail($data);
            }
        // xóa tblcart
        $this->order->delcart($cus_id);
        return redirect()->route('user.orderinfo', $cus_id);
    }

}
