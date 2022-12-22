<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orders;
use PDF;
use DB;
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
        // dd($order);
        return view('order.detail', compact('orderdetail', 'order','total'));
    }

    //update trạng thái thành complete
    public function editcpl($id){
        $data = [1, $id];
        if($this->order->upstatus($data)==null){
            return redirect()->route('order.list')->with('msg', 'Update Order success!');
        }else{
            return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        };
    }
    // update trạng thái thành cancel
    public function editcacel($id){
        $data = [3, $id];
        if($this->order->upstatus($data)==null){
            return redirect()->route('order.list')->with('msg', 'Update Order success!');
        }else{
            return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        };
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
        $all = DB::insert('INSERT into orders(id, cus_id, ord_date, ord_status) values (?, ?,?,?)', [$orderID, $cus_id ,$ord_date , $ord_status]);
        // $update = DB::update('UPDATE  set ord_id = ? where cus_id = ?', [$orderID, $id]);
        // $cart = DB::select("SELECT * from tblcart WHERE cus_id = ?", [$id]);
        dd($all);
    }

}
