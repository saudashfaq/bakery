<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Stock;
use App\Models\Stock_history;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\StocksAddRequest;

class PriceUpdateRM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    ///edit stockss
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function addPricePage($id)
    {

        $unit = Unit::pluck('name', 'id');

        $stock = Stock::find($id);
        return view('stocks.updatequantity')->with('stock', $stock)->with('unit', $unit);

    }

    public function updatePrice(Request $request, $id)
    {

        $stock = Stock::find($id);

        $stock_old_price = $stock->price;

        $stock->items = $request->input('items');
        $stock->price = $request->input('price');
        $stock->unit_id = $request->input('unit_id');
        $stock->quantity = $request->input('quantity');
        $stock->user_id = auth()->user()->id;

        //stock new price..
        $stock_new_price = $stock->price;

        $history = new Stock_history ();

        $history->stock_id = $stock->id;
        $history->old_price = $stock_old_price;
        $history->new_price = $stock_new_price;
        //calculate increment..
        if ($stock_new_price > $stock_old_price) {
            $increments = $stock_new_price - $stock_old_price;

        } else {
            $increments = 0;
        }
        //calculate Decrement ...
        if ($stock_new_price < $stock_old_price) {
            $decrement = $stock_new_price - $stock_old_price;

        } else {
            $decrement = 0;
        }
        $history->increment = $increments;
        $history->decrement = $decrement;

        $history->save();

        $stock->save();

        return redirect()->route('stocks.index');
//            ->with('success', ' updated successfully');


    }

}
