<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Parent_product;
use App\Models\Production;
use App\Models\Size;
use App\Models\Stock;
use App\Models\Product_stock;
use App\Models\Unit;
use Doctrine\DBAL\Portability\Converter;
use Facade\FlareClient\View;
use Faker\Core\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;
use Validator;
use Olifolkerd\Convertor\ConversionRepository;
use Olifolkerd\Convertor\Convertor;
use Illuminate\Database\Eloquent\Relations\Pivot;
use function Sodium\increment;
use App\Http\Requests\ProductRecipeRequest;


class ProductionController extends Controller
{
    public function index()
    {

        $parent_products = Parent_product::latest()->with('category')->get();
        return view('production.index')->with('parent_products', $parent_products);

    }

    // Method for product craete recipe
    public function createProduct()
    {

        $units = Unit::all();
        $stocks = Stock::all();
        $sizes = Size::all();
        $categories = Category::all();

        return view('production.create')->with('units', $units)->with('stocks', $stocks)->with('categories', $categories)->with('sizes', $sizes);


    }


    /* Method for store product todo */
    public function storeProduct(ProductRecipeRequest $request)
    {
//        dd($request->all());
        $product = $request->product;
        // for image..
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);
        $parent_product = Parent_product::create([

            'title' => request('title'),
            'description' => request('description'),
            'category_id' => request('category_id'),
            'image' => $filename,

        ]);
        /*product_size and parent_product_id save in product Table*/
        $size = [];
        $stock_ids = [];
        $quantities = [];
        $unit_ids = [];

        foreach ($product as $key => $value) {

            $product_size = $value['size'];

            $products = new Product();
            $products->parent_product_id = $parent_product->id;
            $products->size_id = $product_size;
            $products->save();


//            array_push($size, $product_size);

            foreach ($product[$key]['recipe'] as $key2 => $value2) {

                $stock_id = $product[$key]['recipe'][$key2]['item'];
                $quantity = $product[$key]['recipe'][$key2]['quantity'];
                $unit_id = $product[$key]['recipe'][$key2]['unit_id'];

//                array_push($stock_ids, $stock_id);
//                array_push($quantities, $quantity);
//                array_push($unit_ids, $unit_id);
//                array_push($unit_ids[$value['size']], $unit_id);
//                $product_recipe->product_stocks()->attach($stock_id  ,['quantity'=>$quantity , 'unit_id'=>$unit_id]);
                //Todo $product_recipe
                $product_recipe = Product::find($products->id);

                $product_recipe->stocks()->attach($stock_id, ['quantity' => $quantity, 'unit_id' => $unit_id]);


                //todo working  as same

                /* $Product_stock = Product_stock::create(['product_id' => $products->id, 'stock_id' => $stock_id, 'quantity' => $quantity, 'unit_id' => $unit_id]);*/

            }

        }

        return redirect()->route('show.products')->with('success', 'Product Created Successfully ');
    }

//
//    /*show recipe method*/
//        public function show($id)
//        {
//
//
//            $products = Product::with(['stock', 'stock.unit'])->where('id', $id)->get();
//
//            $products = Product::with(['stocks', 'units'])->where('id', $id)->first();
//
//
//            $units = [];
//            foreach ($products->units as $unit) {
//                $unit = $unit->name;
//                array_push($units, $unit);
//            }
//
//
//            return view('production.show', compact('products'))->with('units', $units);
//
//        }


    /* produce product by size vise */
    public function produce($id)
    {
        $parent_product = Parent_product::find($id);
        $product_sizes = Product::where('parent_product_id', $id)->with('size')->get();

        return view('production.produce')->with('parent_product', $parent_product)->with('product_sizes', $product_sizes);

    }

//    public function storeProducedProduct(Request $request, $id, Stock $stock)
//    {
//
//        $this->validate($request, [
//            'require_quantity' => 'required',
//            'size' => 'required'
//        ]);
//     // $products = Product::find($id);
////        $products = Product::with('stocks.unit')->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
//        $products = Product::where('parent_product_id', $id)->where('size_id', '=', $request->size)->get();
//
//        //todo unit conversion code commented
////        $products = Product::with('stocks.unit')->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
////        foreach ($products->pivot as $product) {
////            $unit = $product->pivot->unit->name;
////            dump($unit);
////            dump($product->pivot->quantity);
////
////            $simpleConvertor = new Convertor($product->pivot->quantity, "g");
////            return $simpleConvertor->to("kg");
//////
////            if ($product->quantity < $product->pivot->quantity * $request->require_quantity) {
////                return 'quantity is less ';
////            }
////
////        }
//      //  $products = Product::find($id);
////        $products = Product::with('stocks.unit')->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
//        //$products = Product::where('parent_product_id', $id)->where('size_id', '=', $request->size)->get();
//
//        //todo unit conversion code commented
//      $products = Product::with('stocks.unit')->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
////        foreach ($products->pivot as $product) {
////            $unit = $product->pivot->unit->name;
////            dump($unit);
////            dump($product->pivot->quantity);
////
////            $simpleConvertor = new Convertor($product->pivot->quantity, "g");
////            return $simpleConvertor->to("kg");
//////
////            if ($product->quantity < $product->pivot->quantity * $request->require_quantity) {
////                return 'quantity is less ';
////            }
////
////        }
//        foreach ($products as $product) {
//            $product_id = $product->id;
//
//            $products = Product::with(['stocks', 'units'])->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
//
//            $unitInPivot = [];
//
//            foreach ($products->units as $unit_id) {
//                $units = $unit_id->name;
//                array_push($unitInPivot, $units);
//            }
//
//            foreach ($products->stocks as $key => $stock) {
//
//                $stock_units = $stock->unit->name;
////            $unit_of_pivot = $stock->pivot->unit_id;
//                //pivot unit conversion into actual unit
//                $simpleConvertor = new Convertor($stock->pivot->quantity * $request->require_quantity, "$unitInPivot[$key]");
//                $convertedValues = $simpleConvertor->to("$stock_units");
//
//                //check if produced quantity is greater than actual stock quantity
//                if ($stock->quantity < $convertedValues) {
//                    return redirect()->route('show.products')->with('error', 'Sorry your quantity is less than stock quantity ');
//
//                }
//                //deducte produced quantity into stocks table ,
//                $stockTable = Stock::where('id', $stock->id)->first();
//                $stock->update([
//                    'quantity' => $stockTable->quantity - $convertedValues, // quantity of produced  product
//                ]);
//
//            }
//            // save produced product into Inventery table
//            $inventory = Inventory::updateOrCreate([
//                'product_id' => $product_id,
//                'product_id' => $products->id,
//
//            ], [
//                'product_id' => $product_id,
//                'product_id' => $products->id,
//                'finished_goods' => $request->get('require_quantity'),
//
//            ]);
//        }
//
//        return redirect()->route('inventory')->with('success', 'Produced Successfully');
//    }
    public function storeProducedProduct(Request $request, $id, Stock $stock)
    {

        $this->validate($request, [
            'require_quantity' => 'required',
            'size' => 'required'
        ]);

        $products = Product::with(['stocks', 'units'])->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();


        $unitInPivot = [];

        foreach ($products->units as $unit_id) {
            $units = $unit_id->name;
            array_push($unitInPivot, $units);

        }

        $calculate = 0;
        foreach ($products->stocks as $key => $stock) {

            $stock_units = $stock->unit->name;
//            $unit_of_pivot = $stock->pivot->unit_id;
            //pivot unit conversion into actual unit
            $simpleConvertor = new Convertor($stock->pivot->quantity * $request->require_quantity, "$unitInPivot[$key]");
            $convertedValues = $simpleConvertor->to("$stock_units");

            //check if produced quantity is greater than actual stock quantity
            if ($stock->quantity < $convertedValues) {
                return redirect()->route('show.products')->with('error', 'Sorry your quantity is less than stock quantity ');

            }
            //deducte produced quantity into stocks table ,
            $stockTable = Stock::where('id', $stock->id)->first();
            $stock->update([
                'quantity' => $stockTable->quantity - $convertedValues, // quantity of produced  product
            ]);
            $units = $unit_id->name;
//                $product = $stock->price/1000;
//                $calculate = $product * $stock->pivot->quantity;
//                dump($calculate);

            if ($units == 'kg' || $units == 'l') {
                //dd('if',$units);
                $product = $stock->price;
                $calculate += $product * $convertedValues;
//                $product = $stock->price;
//                $calculate += $product * $stock->pivot->quantity;
                // dump($calculate);
            } else {
                //dd('else',$units);
                $product = $stock->price/1;
                $calculate += $product * $convertedValues;
//                $product = $stock->price/1000 ;
//                $calculate += $product * $stock->pivot->quantity;
//                dump($calculate);
            }

           // dump($calculate);



        }
        // dump('Total', $calculate);

        //dd('st');


        // save produced product into Inventery table
        $inventory = Inventory::updateOrCreate([
            'product_id' => $products->id,
        ]);
        foreach ($products->stocks as $key => $stock) {

            $stock_units = $stock->unit->name;
//            $unit_of_pivot = $stock->pivot->unit_id;
            //pivot unit conversion into actual unit
            $simpleConvertor = new Convertor($stock->pivot->quantity * $request->require_quantity, "$unitInPivot[$key]");
            $convertedValues = $simpleConvertor->to("$stock_units");

            //check if produced quantity is greater than actual stock quantity
            if ($stock->quantity < $convertedValues) {
                return redirect()->route('show.products')->with( 'error','Sory your quantity is less than stock quantitity ');

            }
            //deducte produced quantity into stocks table ,
            $stockTable = Stock::where('id', $stock->id)->first();
            $stock->update([
                'quantity' => $stockTable->quantity - $convertedValues, // quantity of produced  product
            ]);

        }
            // save produced product into Inventery table
        $inventory = Inventory::updateOrCreate([
            'product_id' => $products->id,


        ], [
            'product_id' => $products->id,
            'finished_goods' => $request->get('require_quantity'),
            'piece_per_cost' => $calculate,


        ]);

        return redirect()->route('inventory')->with('success', 'Produced Successfully');
    }


    /* TODO method for Edit product '*/
//    public function editProduct($id)
//    {
//        $product = Product::with(['stocks', 'units', 'category'])->where('id', $id)->first();
//
////        $product = Product::with('category')->find($id);
//        $categories = Category::Pluck('name', 'id');
//        $units = Unit::pluck('name', 'id');
//        $products = Stock::pluck('items', 'id');
//
//        return view('production.edit', compact('product'))->with('categories', $categories)->with('units', $units)->with('products', $products);
//
//    }

    /* TODO method for Update product '*/
//    public function updateProduct(Request $request, $id)
//    {
//
//        $this->validate($request, [
//            'title' => 'required',
//            'description' => 'required',
//            'size' => 'required',
////          'price'=>'required',
////            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
//            'category_id' => 'required',
//
//
//        ]);
//
//        $product = Product::find($id);
////        image
////        $filename = time() . '.' . Request()->image->getClientOriginalExtension();
////        request()->image->move(public_path('images'), $filename);
//
//        $product->title = $request->input('title');
//        $product->description = $request->input('description');
//        $product->size = $request->input('size');
//        $product->category_id = $request->input('category_id');
////        $product->image = $filename;
//
//        if ($request->hasFile('image')) {
//            $destiantion = 'images' . $product->image;
//            if (File::exists($destiantion)) {
//                File::delete($destiantion);
//            }
//            $file = $request->file('image');
//            $extention = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extention;
//            $file->move(public_path('images'), $filenam);
//            $product->iamge = $filename;
//        }
////        $filename = time() . '.' . request()->image->getClientOriginalExtension();
////        request()->image->move(public_path('images'), $filename);
//        $product->update();
//
//
//        return redirect()->route('show.products')->with('message', 'products updated Successfully');
//
//    }

    /* Todo Mehtod for delete products*/
//    public function deleteProduct($id)
//    {
//
//        $product = Product::find($id);
//        $product->delete();
//
//        return redirect()->route('show.products')->with('message', 'deleted Successfully');;
//
//    }

    public function showInventory()
    {
        $inventories = Inventory::latest()->with(['products.parent_product'])->get();

        return view('inventory.showinventory')->with("inventories", $inventories);

    }
}
