<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    private $cat;
    private $htmlSelect;
    public function __construct(){
        $this->cat = new Category();
        $this->htmlSelect = '';
    }

    function RecusiveCat($parent_id, $id = 0, $text = ''){
        $category = $this->cat->getAllCat();
            foreach($category as $item){
                if($item->parent_id == $id){
                    if(!empty($parent_id) && $item->id == $parent_id){
                        $this->htmlSelect .= "<option value = '$item->id' selected>".$text.$item->name."</option>";
                    }else{
                        $this->htmlSelect .= "<option value = '$item->id'>".$text.$item->name."</option>";
                    }
                    $this->RecusiveCat($parent_id, $item->id, $text."-");
                }
            }
        return $this->htmlSelect;
    }

    public function list(){
        $category = $this->cat->getAllCat();
        return view('category.list', compact('category'));
    }

    public function add(){
        $htmlSelect = $this->RecusiveCat(null);
        return view('category.add', compact('htmlSelect'));
    }

    public function postadd(Request $req){
        $rules = [
            'cat_name' => 'required'
        ];
        $message = [
            'cat_name.required' => 'Category Name cannot be left blank!'
        ];
        $req->validate($rules, $message);
        $catname = $req->cat_name;
        $parent_id = $req->parent_id;
        $data = [$catname, $parent_id];
        if(($this->cat->addCat($data))==null){
            return redirect()->route('category.list')->with('msg', 'Add successful category!');
        }else{
            return redirect()->back()-with('msg', 'Add failure category!');
        }
    }

    public function edit($id){
        $htmlSelect = $this->RecusiveCat($id);
        $cat = $this->cat->getCat($id);
        // dd($cat[0]->name);
        return view('category.add', compact('htmlSelect', 'cat'));
    }
}
