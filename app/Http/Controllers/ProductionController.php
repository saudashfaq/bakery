<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Production;
use App\Models\Stock;
use App\Models\Unit;
use Doctrine\DBAL\Portability\Converter;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use Olifolkerd\Convertor\ConversionRepository;
use Olifolkerd\Convertor\Convertor;



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
        $inventories = Inventory::where('product_id' ,"=", $id)->get();


//        $inventory = Inventory::find();
//        $stocks = new Stock();

        /**/
//        dd($products->recipe);
        foreach($products->recipe as $key => $value) {


            $used_quantity = $value['quantity'] * $request->input('require_quantity');


//            var_dump("used".$used_quantity); useto

            $stocks = Stock::where('id', $value['item'])->get();

//sr Ad
          /*  if(!empty($stocks) ) {
                return'ok';
                if($stocks->quantity > 0 ) {
                        }
            }*/


            //$stockNotMatch = Stock::where('id', '=' , $value['item'])->count();
            foreach ($stocks as $stock){
//                $extra_quntiy = $stock->quantity - $used_quantity;

                /*stock qty leesthan  > used qty*/
                $check = $stock->quantity < $used_quantity;
                if (!empty($stock)) {

                    if ($check) {
                        return redirect()->route('show.products')->with('error', ' quantity is Less that entered, Please Manage your raw material ');

                    }
                    else{
                        foreach ($inventories as $invnt) {


                            $inventory = Inventory::updateOrCreate([
                                'product_id' => $products->id,

                            ], [
                                'product_id' => $products->id,
                                'finished_goods' => $request->get('require_quantity') + $invnt->finished_goods


                            ]);

                        }

                  /*      $inventory->product_id = $products->id;
                        $inventory->finished_goods = $request->input('require_quantity');

                        $inventory->save();
//                    $inventory->save();*/


                        return redirect()->route('inventory')->with('success' , 'Produced Successfully');
                    }
                }

//                if (empty($stocks)){
//                   echo 'sorry item not founds';
//                }



//                /*item not found in raw material */
//               elseif ($stockNotMatch){
//                    return redirect()->route('show.products')->with('error', 'item Not found in Raw Material');
//
//                }
//                else{
//                    $inventory->product_id = $products->id;
//                    $inventory->finished_goods = $request->input('require_quantity');
//                    $inventory->save();
////                    return "produce Succesfully ";
//                }

        }


            /*
                $inventory->product_id = $products->id;
                $inventory->finished_goods = $request->input('require_quantity');
                $inventory->save();*/
        }


    }

    public function showInventory(){
        $inventories = Inventory::latest()->with('product')->get();

        return view('inventory.showinventory')->with("inventories",$inventories);

    }

}
