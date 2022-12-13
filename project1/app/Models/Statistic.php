<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Statistic extends Model
{
    use HasFactory;
    public function getlistday($keyword){
        $listODday = DB::select("SELECT O.id, C.fullname, O.ord_date, sum(Od.pro_price*Od.quantity) as total from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        inner join customers C on C.id = O.cus_id
        where date_format(O.ord_date,'%Y-%m-%d') = '$keyword' group by O.id");
        return $listODday;
    }

    public function getsubtotalday($keyword){
        $subtotalday = DB::select("SELECT sum(Od.pro_price*Od.quantity) as subtotal from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        where  date_format(O.ord_date,'%Y-%m-%d') = '$keyword'");
        return $subtotalday;
    }
}
