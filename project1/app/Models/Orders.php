<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Orders extends Model
{
    use HasFactory;
    public function getorder(){
        $orders = DB::select("SELECT * FROM orders");
        return $orders;
    }

}
