<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOutletRequest;
use App\Models\Outlet;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;


class OutletsController extends Controller
{
    public function index(){

        $outlets = Outlet::where('user_account_id' , auth()->user()->user_account_id)->latest()->get();

        return view('brandoutlet.index' , compact('outlets'));
    }
    public function createOutlet()
    {

        return view('brandoutlet.createoutlet');

    }

    public function storeOutlet(CreateOutletRequest  $request)
    {
        $outlet = new Outlet();
        $outlet->user_account_id = auth()->user()->user_account_id;
        $outlet->outlet_name = $request->outlet_name;
        $outlet->type = $request->type;
        $outlet->branch_manager_name = $request->branch_manager_name;
        $outlet->manager_email = $request->manager_email;
        $outlet->location = $request->location;
        $outlet->save();

     return redirect()->back()->with('success' , 'Outlet Created Successfully');

    }
}
