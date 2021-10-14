<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Production;
use App\Models\Stock;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;


class ProductionController extends Controller
{
    public function index (){
        $products  = Product::latest()->with('category')->get();

//        $products  = Product::where('recipe->item')->get();
//        dd($products);
//        json_decode($response)
//        foreach (json_decode($products) as $product){
//dd($products);
//               foreach ($products->recipe as $key => $value)
//               {
//                   dd($value);
//               }
//
//        }
//endforeach
//        return view('production.index')->with('products' , $products);
//        $recipe = ($products[0]->recipe[0]['item'] );
//        dd($recipe);
//        return view('production.index', compact('products'));
//        dd($products->recipe);
        return view('production.index')->with('products',$products);

    }
//$stocks = Stock::latest()
    // method for product craete recipe
    public function createProduct (){

        $units = Unit::pluck('name','id');
        $products = Stock::pluck('product','id');
        /*for create product by name and image */
        $categories = Category::pluck('name','id');  // name is key and id is value
//        return view('products.create' , compact('categories'));
        return view('production.create')->with('units' , $units)->with('products' , $products)->with('categories', $categories );
//        return view('production.newfile')->with('units' , $units)->with('products' , $products);


    }

        /*store product recipe*/
    function storeProduct(Request $request)
    {
//        dd($request->all());
        $items = $request->item;
        $quantities = $request->quantity;
        $unit = $request->unit;

        $data = [];

//   ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
        foreach ($items as $key => $item) {

            $local_array = [
                'item' => $item,
                'quantity' => $quantities[$key],
                'unit' => $unit[$key]
            ];
            array_push($data, $local_array);


        }

//dd(json_encode($data));
//dd('stop');

        //validations
        $products = new Product();
//        $stocks = new Stock();

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'size' => 'required',
//            'price'=>'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
            'category_id' => 'required',
//            recipe validation
//           Todo add recipe validation

        ]);
        //image
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

//  Production::insert($data , );
//dd(json_encode($data));
        $products = Product::create([
            'title' => request('title'),
            'description' => request('description'),
            'size' => request('size'),
            'category_id' => request('category_id'),
            'recipe' => json_encode($data),
            'image' => $filename,

        ]);

//        return redirect('/products')->with('message' , 'products created Successfully');
//        return view('production.index')->with('message', 'products created Successfully');
        return'products created Successfully';
    }

        /*  shoe recipe method*/
    public function show($id)
    {
//        return view('stocks.show', compact('product'));
        $products = Product::find($id);

        return view('production.show')->with( 'products',$products);


    }
    public function produce($id)
    {
        $products = Product::find($id);

        return view('production.produce')->with( 'products',$products);


    }


    public function storeProducedProduct(Request $request , $id , Stock $stock){

        $this->validate($request ,[
        'require_quantity'=>'required'
            ]);

        $products = Product::find($id);
        $inventory = new Inventory();
//        $stocks = new Stock();

        /**/
        foreach($products->recipe as $key => $value) {
//            dd($value['quantity']);
//            var_dump( $value['quantity']);
      ;
            $used_quantity = $value['quantity'] * $request->input('require_quantity');


//dd();
//            var_dump("used".$used_quantity); useto
//
//            $stockis = Stock::get('quantity');
////
//            dd($stocks);
            $stocks = Stock::where('id', $value['item'])->get();

            foreach ($stocks as $stock){
                $extra_quntiy = $stock->quantity - $used_quantity;

                /*stock qty kam hai > used qty*/
                $check = $stock->quantity < $used_quantity;
//                var_dump('extrastock'.$extra_quntiy); useto
//                var_dump($check);
//                dd('stop');
                if ($check){
//                    return route('show.products')->with('error' ,'quantity is Less that entered');
                    return redirect()->route('show.products')->with('error', ' quantity is Less that entered, Please Manage your raw material ');
//
//                    break;
                }
                else{
                    $inventory->product_id = $products->id;
                    $inventory->finished_goods = $request->input('require_quantity');
                    $inventory->save();
                    return "produce Succesfully ";
                }

                var_dump('extrastock'.$extra_quntiy);

                /*stock qty zyda hai > used qty*/
               /* if ($stock->quantity > $used_quantity){

                    echo "ok";
                }*/


//                var_dump($stock->quantity - $used_quantity);

        }
// $stocks->update();
//            dd( $value['item']);
//            dd($stocks);


            /*
                $inventory->product_id = $products->id;
                $inventory->finished_goods = $request->input('require_quantity');
                $inventory->save();*/





        }


    }
























//        'category_id' => request('category_id'),

//            'quantity' => request('quantity'),

//            'unit' => request('interests'),
//            $products->image=>$filename,
//            'item' => json_encode($items),
//            'hobbies' => json_encode($hobbies),
//dd($products);
//        ..........................................................................
//        $filename = time().'.'.request()->image->getClientOriginalExtension();
//        request()->image->move(public_path('images'), $filename);

//
//        $products->title = $request->input('title');
//        $products->description = $request->input('description');
//        $products->size = $request->input('size');
//        $products->category_id = $request->input('category_id');
////        $products->item = $request->input('item');
////        $products->quantity = $request->input('quantity');
////        $products->unit = $request->input('unit');
//        $item = $request->input('item');
//        $quantity = $request->input('quantity');
//        $unit = $request->input('unit');
//        $insert_data = [];
//
//        //Images
//        $filename = time().'.'.request()->image->getClientOriginalExtension();
//        request()->image->move(public_path('images'), $filename);
//
//
//
//
//
//        for($count = 0; $count < count($item); $count++) {
//            $data = array(
//                'item' => $item[$count],
//                'quantity' => $quantity[$count],
//                'unit' => $unit[$count]
//            );
////            array_push($insert_data , $data);
//        }
//        $products->item = $data['item'];
//        $products->quantity =$data['quantity'];
//       $products->unit = $data['unit'];
//
//        $products->image=$filename;
//        $products->save();
//..................................................................................................
//        .........................................
        // image uploads
//        $image = $request->image;
////        dd($image);
//        if ($image){
//            $imageName = $image->getClientOriginalName();
//            $image->move('images' , $imageName);
//            $formInput['image'] = $imageName;
////            dd($imageName);
//            Product::create($formInput);
////            return $formInput;
//
//            return 'ok';
////            return redirect('/products')->with('message' , 'products created Syccessfully');
//        }



// /........................................

//        if($request->ajax())
//        {
//            $rules = array(
//                'item.*'  => 'required',
//                'quantity.*'  => 'required',
//                'unit.*'  => 'required'
//            );
//            $error = Validator::make($request->all(), $rules);
//            if($error->fails())
//            {
//                return response()->json([
//                    'error'  => $error->errors()->all()
//                ]);
//            }
//            $item = $request->item;
//            $quantity = $request->quantity;
//            $unit = $request->unit;
//            $insert_data = [];
////            dd($product,$quantity,$unit);
////            dd($request->all());
//            for($count = 0; $count < count($item); $count++)
//            {
//                $data = array(
//                    'item' => $item[$count],
//                    'quantity'  => $quantity[$count],
//                    'unit'  => $unit[$count]
//                );
//                array_push($insert_data , $data);
//            }
////dd('formdata',$formInput);
//             $p = Product::insert( $formInput );
//            dd($p);
//
//            return response()->json([
//                'success'  => 'Data Added successfully.'
//            ]);
//        }






    /*
    public   function insert(Request $request)
    {
        if($request->ajax())
        {
            $rules = array(
                'product.*'  => 'required',
                'quantity.*'  => 'required',
                'unit.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $product = $request->product;
            $quantity = $request->quantity;
            $unit = $request->unit;
            for($count = 0; $count < count($product); $count++)
            {
                $data = array(
                    'product' => product[$count],
                    'quantity'  => quantity[$count],
                    'unite'  => unit[$count]
                );
                $insert_data[] = $data;
            }

            Production::insert($insert_data);
//            return response()->json([
//                'success'  => 'Data Added successfully.'
//            ]);
            return "ok";
        }

//
//
//            $product = $request->input('product');
//            $quantity = $request->input('quantity');
//            $unit = $request->input('unit_id');
////            'unit_id' => 'required',
////            'quantity' => 'required'
//
//
//
            return 'Run ';

    }*/

}
