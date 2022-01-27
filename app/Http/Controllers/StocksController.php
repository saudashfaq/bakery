<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\StocksAddRequest;


class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//

    public function index()
    {
//        $stocks = Stock::latest()->with('unit')->paginate(5);
        $stocks = Stock:: where('user_account_id' , auth()->user()->user_account_id)->latest()->with('unit')->get();

//dd($stocks);
//        return view('stocks.index', compact('stocks'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('stocks.index', compact('stocks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::pluck('name', 'id');
        return view('stocks.create')->with('unit', $unit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StocksAddRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StocksAddRequest $request)
    {

//
        //Add raw material ..
        $stock = new Stock();
        $stock->items = $request->input('items');
        $stock->price = $request->input('price');
        $stock->unit_id = $request->input('unit_id');
        $stock->quantity = $request->input('quantity');
        $stock->user_id = auth()->user()->id;
        $stock->user_account_id = auth()->user()->user_account_id;

        $stock->save();
        return redirect()->route('stocks.index')->with('success', 'Add successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */

    // check this method
    public function show(Stock $stock)
    {

        return view('stocks.show', compact('stock'));
    }

    ///edit stockss

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $unit = Unit::pluck('name', 'id');
//        return view('stocks.edit', compact('stock'));
        return view('stocks.edit')->with('stock', $stock)->with('unit', $unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StocksAddRequest $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(StocksAddRequest $request, Stock $stock)
    {

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', ' updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        dd('stop');

        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Product deleted successfully');
    }

}

