<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    use HasFactory;
    public function addproduct($data){
        DB::insert("INSERT INTO product(id, pro_name, pro_price, cat_id, pro_quantity) values(?, ?, ?, ?, ?)", $data);
    }

    public function addprodesc($data){
        DB::insert("INSERT INTO prodesc(pro_id, size, brand, origin, type, diment, descrip) values(?,?,?,?,?,?,?)", $data);
    }

    public function addproimage($data){
        DB::insert("INSERT INTO proimage(pro_id, img_first, img_second, img_third) values(?,?,?,?)", $data);
    }

    public function getlistpro(){
        $pro = DB::select("SELECT P.id, P.pro_name, C.name, P.pro_price, P.pro_quantity, P.create_at from product P
        inner join category C on C.id = P.cat_id");
        return $pro;
    }

    public function getpro($id){
        $pro = DB::select("SELECT P.id, P.pro_name, P.cat_id, P.pro_price, P.pro_quantity, D.size, D.brand, D.origin, D.type, D.diment, D.descrip
        from product P
        inner join prodesc D on P.id = D.pro_id WHERE P.id = ?", [$id]);
        return $pro;
    }

    public function getimgpro($id){
        $pro = DB::select("SELECT * FROM proimage WHERE pro_id = ?", [$id]);
        return $pro;
    }

    public function upproduct($data){
        DB::update("UPDATE product SET pro_name=?, pro_price=?, cat_id=?, pro_quantity=?, update_at=? WHERE id = ?", $data);
    }

    public function upprodesc($data){
        DB::update("UPDATE prodesc SET size=?, brand=?, origin=?, type=?, diment=?, descrip=? WHERE pro_id = ?", $data);
    }

    public function upproimage($data){
        DB::update("UPDATE proimage SET img_first=?, img_second=?, img_third=? WHERE pro_id = ?", $data);
    }

    public function delproduct($id){
        DB::delete("DELETE FROM product WHERE id = ?", [$id]);
    }

    public function delprodesc($id){
        DB::delete("DELETE FROM prodesc WHERE id = ?", [$id]);
    }

    public function delproimage($id){
        DB::delete("DELETE FROM proimage WHERE id = ?", [$id]);
    }


    // phan nam lam
    public function getAll(){
        $data = DB::select("SELECT * FROM product pr INNER JOIN proimage pm on pr.id=pm.pro_id inner join prodesc pd on pd.pro_id=pr.id");
        return $data;
    }
    public function getP($id){
        return DB::select("SELECT * FROM product pr INNER JOIN proimage pm on pr.id=pm.pro_id inner join prodesc pd on pd.pro_id=pr.id inner join category ca on ca.id=pr.cat_id where pr.id=?",[$id]);
    }
}
