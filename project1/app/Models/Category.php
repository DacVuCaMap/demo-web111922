<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    use HasFactory;
    public function getAllCat(){
        $cat = DB::select("SELECT * FROM category");
        return $cat;
    }

    public function getCat($id){
        $cat = DB::select("SELECT * FROM category WHERE id = ?", [$id]);
        return $cat;
    }

    public function addCat($data){
        DB::insert("INSERT INTO category(name, parent_id) values(?, ?)", $data);
    }
}
