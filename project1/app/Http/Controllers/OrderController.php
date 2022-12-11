<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
class OrderController extends Controller
{
    private $order;
    public function __construct(){
        $this->order = new Orders();
    }
    public function list(){
        $orders = $this->order->getorders();
        return view('order.list', compact('orders'));
    }

    public function detail($id){
        $orderdetail = $this->order->getdetail($id);
        $order       = $this->order->getorder($id);
        $total       = $this->order->totalorder($id);
        return view('order.detail', compact('orderdetail', 'order','total'));
    }

    public function editcpl($id){
        $data = [1, $id];
        if($this->order->upstatus($data)==null){
            return redirect()->route('order.list')->with('msg', 'Update Order success!');
        }else{
            return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        };
    }

    public function editcacel($id){
        $data = [3, $id];
        if($this->order->upstatus($data)==null){
            return redirect()->route('order.list')->with('msg', 'Update Order success!');
        }else{
            return redirect()->route('order.list')->with('msg', 'Update Order failed!');
        };
    }
}
