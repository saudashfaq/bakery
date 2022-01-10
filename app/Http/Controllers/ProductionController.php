<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Attribute_head;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Parent_product;
use App\Models\Production;
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
use App\Http\Requests\CreateReadyMadeProductRequest;


class ProductionController extends Controller
{
    public function index()
    {

        $parent_products = Parent_product::latest()->where('user_account_id' , auth()->user()->user_account_id)->with('category')->get();

        return view('production.index')->with('parent_products', $parent_products);
//        return view('sample')->with('parent_products', $parent_products);

    }

    // Method for product craete recipe
    public function createProduct()
    {

        $units = Unit::all();
        $stocks = Stock::where('user_account_id' , auth()->user()->user_account_id)->get();
        $categories = Category::where('user_account_id' , auth()->user()->user_account_id)->get();
        $attributeHeads = Attribute_head::with('attributes')
            ->where('user_account_id' , auth()->user()->user_account_id)->get();

        return view('production.create', compact('attributeHeads'))->with('units', $units)->with('stocks', $stocks)->with('categories', $categories);


    }


    /* Method for store product todo request class name ProductRecipeRequest */
    public function storeProduct(Request $request)
    {

        $product = $request->product;
        // for image..
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        $parent_product = Parent_product::create([

            'title' => request('title'),
            'description' => request('description'),
            'category_id' => request('category_id'),
            'image' => $filename,
            'brand_name' => 'local',
            'user_account_id' => auth()->user()->user_account_id,
            'user_id' => auth()->user()->id,

        ]);

        /*product_size and parent_product_id save in product Table*/

        $stock_ids = [];
        $quantities = [];
        $unit_ids = [];

        foreach ($product as $key => $value) {

//            $product_size = $value['size'];

            $products = new Product();
            $products->parent_product_id = $parent_product->id;
            $products->save();

            /*for attributs save in product_attributes table */
            foreach ($product[$key]['attribute'] as $key2 => $value2) {

                $attributeHead_id = $product[$key]['attribute'][$key2]['attributeHead_id'];
                $attribute_id = $product[$key]['attribute'][$key2]['attribute_id'];

                $product_recipe = Product::find($products->id);
                $product_recipe->attributes()->attach($attribute_id);

            }

            /*for recipe in product_stocks table */
            foreach ($product[$key]['recipe'] as $key2 => $value2) {

                $stock_id = $product[$key]['recipe'][$key2]['item'];
                $quantity = $product[$key]['recipe'][$key2]['quantity'];
                $unit_id = $product[$key]['recipe'][$key2]['unit_id'];

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
    public function show($id)
    {
        $parent_product = Parent_product::find($id);
        $product_attributes = Product::with(['stocks', 'attributes.attributeHeads', 'parent_product.category'])->where('parent_product_id', $id)->get();

//todo

//            $units = [];
//            foreach ($products->units as $unit) {
//                $unit = $unit->name;
//                array_push($units, $unit);
//            }


        return view('production.show', compact('product_attributes'))->with('parent_product', $parent_product);

    }


    /* produce product by size vise */
    public function produce($id)
    {
        $parent_product = Parent_product::find($id);

        $product_attributes = Product::with(['attributes.attributeHeads'])->where('parent_product_id', $id)->get();


        return view('production.produce')->with('parent_product', $parent_product)->with('product_attributes', $product_attributes);

    }

    public function storeProducedProduct(Request $request, $id, Stock $stock)
    {


        $this->validate($request, [
            'require_quantity' => 'required',
            'product_id' => 'required'
        ]);


//        $products = Product::with(['stocks', 'units'])->where('parent_product_id', $id)->where('id', '=', $request->product_id)->first();
        $products = Product::with(['stocks', 'units'])->where('id', '=', $request->product_id)->first();



        $unitInPivot = [];

        foreach ($products->units as $unit_id) {
            $units = $unit_id->name;
            array_push($unitInPivot, $units);

        }

        $costPerPiece = 0;
        foreach ($products->stocks as $key => $stock) {

            $stock_units = $stock->unit->name;
//            $unit_of_pivot = $stock->pivot->unit_id;
            //pivot unit conversion into actual unit
            $simpleConvertor = new Convertor($stock->pivot->quantity * $request->require_quantity, "$unitInPivot[$key]");
            $convertedValues = $simpleConvertor->to("$stock_units");

            //check if produced quantity is greater than actual stock quantity
            if ($stock->quantity < $convertedValues) {

                return redirect()->route('show.products')->with('error', 'Sory your quantity is less than stock quantitity ');


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
                $costPerPiece += $product * $convertedValues;
//                $product = $stock->price;
//                $calculate += $product * $stock->pivot->quantity;
                // dump($calculate);
            } else {

                $product = $stock->price/1;
                $costPerPiece += $product * $convertedValues;
//                $product = $stock->price/1000 ;
//                $calculate += $product * $stock->pivot->quantity;
//                dump($calculate);
            }

        }

        // save produced product into Inventery table
        $inventories = Inventory::where('product_id', $request->product_id)->first();

        // if product exist in inventory plus previous quantity of finshed_goods
        if ($inventories == !null) {
            $inventory = Inventory::updateOrCreate([
                'product_id' => $products->id,

        // dump('Total', $calculate);


            ],[
                'product_id' => $products->id,
                'finished_goods' => $request->get('require_quantity') + $inventories->finished_goods,
                'piece_per_cost'=>$costPerPiece

            ]);

            return redirect()->route('inventory')->with('success', 'Produced Successfully');

        } // if product not exist in inventory / first time produce
        else {

            $inventory = Inventory::updateOrCreate([
                'product_id' => $products->id,

            ], [
                'product_id' => $products->id,
                'finished_goods' => $request->get('require_quantity'),
                'piece_per_cost'=>$costPerPiece,
                'user_account_id' =>  auth()->user()->user_account_id,
                'user_id' => auth()->user()->id

            ]);

            return redirect()->route('inventory')->with('success', 'Produced Successfully');
        }
    }


    /* TODO method for Edit product '*/
//    public function editProduct($id)
//    {
//
//
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


    public function editRecipe($id)
    {
        $inventory_productIds = [];

        $parent_product = Parent_product::find($id);

        $products = Product::with(['attributes.attributeHeads', 'inventories'])->where('parent_product_id', $id)->get();

        foreach ($products as $key => $product) {
            foreach ($product->inventories as $inventory) {
                $inventory_productId = $inventory->product_id;
                array_push($inventory_productIds, $inventory_productId);
            }

        }

        return view('production.editrecipe',compact('parent_product'))->with('products', $products)->with('inventory_productIds', $inventory_productIds);

    }

    public function editAbleRecipe(Request $request, $id)
    {

        $this->validate($request, [
            'product_id' => 'required',

        ]);

        $pivotStocks = [];
        $pivotunit_id = [];


//        $parent_product = Parent_product::find($id);
//        $products = Product::with(['stocks', 'units'])->where('parent_product_id', $id)->where('size_id', '=', $request->size)->first();
        $products = Product::with(['stocks', 'units'])->where('id', $request->product_id)->first();

        foreach ($products->stocks as $stocks) {

            $pivotStock_id = $stocks->pivot->stock_id;

            $units = $stocks->pivot->unit_id;
            array_push($pivotunit_id, $units);
            array_push($pivotStocks, $pivotStock_id);

        }

//        $inventory = Inventory::where('product_id', '=', $request->product_id)->first();

//        if ($inventory == !null) {
//            return redirect()->route('show.products')->with('error', 'Sorry this product recipe not editeable Because this  product is produced ');
//        } else {
//            return 'yes';
//        }

//        else {
            $unitAll = Unit::all();
            $stocks = Stock::all();

            return view('production.editablerecipe', compact('products'))->with('stocks', $stocks)->with('unitAll', $unitAll)->with('pivotStocks', $pivotStocks)->with('pivotunit_id', $pivotunit_id);



    }

    public function updateRecipe(Request $request, $id)
    {
//        dd($request->all());

        $product = $request->product;

        /*product_size and parent_product_id save in product Table*/
        $stock_ids = [];
        $quantities = [];
        $unit_ids = [];

        foreach ($product as $key => $value) {

//            $product_size = $value['size'];
//
//            $products = new Product();
//            $products->parent_product_id = $perent_product->id;
//            $products->size_id = $product_size;
//            $products->save();

            foreach ($product[$key]['recipe'] as $key2 => $value2) {

                $stock_id = $product[$key]['recipe'][$key2]['item'];
                $quantity = $product[$key]['recipe'][$key2]['quantity'];
                $unit_id = $product[$key]['recipe'][$key2]['unit_id'];


                $product_recipe = Product::find($id);

                $product_recipe->stocks()->detach($stock_id, ['quantity' => $quantity, 'unit_id' => $unit_id]);

                $product_recipe->stocks()->attach($stock_id, ['quantity' => $quantity, 'unit_id' => $unit_id]);

            }
        }
        return redirect()->route('show.products')->with('success', 'Edit successfully');
    }


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
        $inventories = Inventory::latest()->where('user_account_id' , auth()->user()->user_account_id)->with(['products.parent_product', 'products.attributes.attributeHeads'])->get();

        return view('inventory.showinventory')->with("inventories", $inventories);

    }

    public function createReadyMadeProduct()
    {
//        $sizes = Size::all();
        $attributeHeads = Attribute_head::with('attributes')->where('user_account_id' , auth()->user()->user_account_id)->get();
        $categories = Category::where('user_account_id' , auth()->user()->user_account_id)->get();

        return view('production.createreadymadeproduct')->with('categories', $categories)->with('attributeHeads', $attributeHeads);

    }

    //CreateReadyMadeProductRequest request class
    public function storeReadyMadeProduct(CreateReadyMadeProductRequest $request)
    {

        $attributes = $request->attribute;

        foreach ($attributes as $attribute) {
            dump($attribute['attribute_id']);


        }


        /*save parent Product */
        /*image*/
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);
        $perent_product = Parent_product::create([

            'title' => request('title'),
            'description' => request('description'),
            'category_id' => request('category_id'),
            'image' => $filename,
            'brand_name' => request('brand_name')

        ]);

        $products = new Product();
        $products->parent_product_id = $perent_product->id;
        $products->save();

        foreach ($attributes as $attribute) {
            $attribute_id = $attribute['attribute_id'];
            $product_attributes = Product::find($products->id);
            $product_attributes->attributes()->attach($attribute_id);

        }


        return redirect()->route('show.products')->with('success', 'Ready Made Product Created Successfully ');
    }

    public function search()
    {
        $search_text = $_GET['search'];

        $parent_products = Parent_product::where('title', 'LIKE', '%' . $search_text . '%')->with('category')->get();
        return view('production.searchproduct')->with('parent_products', $parent_products);

    }

}
