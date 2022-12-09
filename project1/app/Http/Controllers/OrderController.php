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
        $orders = $this->order->getorder();
        // dd($orders);
        return view('order.list', compact('orders'));
    }
}
