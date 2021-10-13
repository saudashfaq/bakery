<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
//       $products = Product::orderBy('created_at' , 'desc');
        return view('products.index')->with('products' , $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name','id');  // name is key and id is value
        return view('products.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formInput = $request->except('image');
//        dd($formInput);
        //validations
        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'size'=> 'required',
//            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
            'category_id'=>'required'

        ]);
        // image uploads
        $image = $request->image;
        if ($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images' , $imageName);
            $formInput['image'] = $imageName;
            Product::create($formInput);
            return redirect('/products')->with('message' , 'products created Syccessfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
