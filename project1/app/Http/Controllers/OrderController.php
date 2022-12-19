<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orders;
use PDF;
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
        // dd( $orders);
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

    // insert vào orders và orderDatil
    // public function insertORders(){
    //     $tblcsrt = DB::seldcy(ỵyrjyj)
    // }

}
