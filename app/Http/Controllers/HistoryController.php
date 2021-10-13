<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Stock_history;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\StocksAddRequest;


class HistoryController extends Controller
{

    public function showHistory(){

        $histories = Stock_history::latest()->with('stocks')->get();


//        $histories =  Stock_history::all()->orderBy('id', 'DESC');;
//        dd($histories);
//        var_dump($histories);
          return view('history.rawmaterialhistory' , compact('histories'));
//              ->with('histories', $histories);

//        $audits =  Stock::find(1)->audits;
//        $audits =  Stock::find(1)->audits;
//        return view('history.rawmaterialhistory' , compact('audits'));
    }
}
