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

          return view('history.stockhistory' , compact('histories'));



    }
    public  function showHistoryById($id)
    {
        $histories = Stock_history::with('stocks')->where('stock_id', $id)->get();

        return view('history.stockhistorybyid' , compact('histories'));


    }
}
