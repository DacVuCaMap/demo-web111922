<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Orders extends Model
{
    use HasFactory;
    public function getorders($key_id, $key_cus, $key_sta){
        $condition = "1=1";
        if($key_id != null){
            $newkey     = str_replace(' ', '%', $key_id);
            $condition .= " AND id LIKE '%{$newkey}%'";
        }

        if($key_cus != null){
            $newkey     = str_replace(' ', '%', $key_cus);
            $condition .= " AND cus_id LIKE '%{$newkey}%'";
        }

        if($key_sta != null){
            $newkey     = str_replace(' ', '%', $key_sta);
            $condition .= " AND ord_status LIKE '%{$newkey}%'";
        }

        $orders = DB::select("SELECT * FROM orders WHERE $condition");
        return $orders;
    }

    public function getdetail($id){
        $ordetail = DB::select("SELECT Od.pro_id, Od.pro_price, Od.quantity, (Od.pro_price*Od.quantity) as total
        from orderDetail Od
        inner join orders O on O.id = Od.ord_id
        inner join customers C on C.id = O.cus_id
        where O.id = ?", [$id]);
        return $ordetail;
    }

    public function getorder($id){
        $orders = DB::select("SELECT O.id, C.fullname, C.phone, C.address, C.email, O.ord_date, O.ord_status from orders O
        inner join customers C on O.cus_id = C.id  WHERE O.id =?", [$id]);
        return $orders;
    }

    public function totalorder($id){
        $subtotal = DB::select("SELECT sum(Od.pro_price*Od.quantity) as subtotal from orderDetail Od
        inner join orders O on O.id = Od.ord_id
        inner join customers C on C.id = O.cus_id
        where O.id = ?", [$id]);
        return $subtotal;
    }

    public function upstatus($data){
        DB::update("UPDATE orders SET ord_status = ? Where id =?", $data);
    }

}
