<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
class StatisticController extends Controller
{
    private $statistic;
    public function __construct(){
        $this->statistic = new Statistic();
    }
    public function list(Request $req){
        $keyword = $req->keyword;
        // dd($keyword);
        $listorderday = $this->statistic->getlistday($keyword);
        // dd($listorderday);
        $subtotalday = $this->statistic->getsubtotalday($keyword);
        // dd($subtotalday);
        return view('statistic.sales', compact('keyword', 'listorderday', 'subtotalday'));
    }
}
