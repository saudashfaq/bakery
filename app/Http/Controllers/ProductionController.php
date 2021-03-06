<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Attribute_head;
use App\Models\Brand_outlet;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Parent_product;
use App\Models\Product_outlet;
use App\Models\Production;
use App\Models\Stock;
use App\Models\Product_stock;
use App\Models\Unit;
use App\Models\User;
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
    public $total_orders = 0;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $parent_products = Parent_product::latest()->where('user_account_id', auth()->user()->user_account_id)->with('category')->get();

        return view('production.index')->with('parent_products', $parent_products);
//        return view('sample')->with('parent_products', $parent_products);

    }

    // Method for product craete recipe
    public function createProduct()
    {

        $units = Unit::all();
        $stocks = Stock::where('user_account_id', auth()->user()->user_account_id)->get();
        $categories = Category::where('user_account_id', auth()->user()->user_account_id)->get();
        $attributeHeads = Attribute_head::with('attributes')
            ->where('user_account_id', auth()->user()->user_account_id)->get();

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
            $products->user_id = auth()->user()->id;
            $products->user_account_id = auth()->user()->user_account_id;
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
        /*for set selling price or reset selling  price of inventory products */
//dd($id);
//        if ($request->selling_price_per_piece || $request->reset_price_per_piece ){
        if ($request->selling_price_per_piece) {
            $inventory = Inventory::find($id);
            $inventory->selling_price_per_piece = $request->selling_price_per_piece;
            $inventory->update();

            return redirect()->back()->with('success', 'Price set successfully');
        }
        if ($request->reset_price_per_piece) {
//                dd('reset');
            $inventory = Inventory::find($id);
            $inventory->selling_price_per_piece = $request->reset_price_per_piece;
            $inventory->update();

            return redirect()->back()->with('success', 'Price Reset successfully');
        }
//        }


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
//dd($products->stocks);
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

                $product = $stock->price / 1;
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

            ], [
                'product_id' => $products->id,
                'product_quantity' => $request->get('require_quantity') + $inventories->product_quantity,
                'cost_per_piece' => $costPerPiece

            ]);

            return redirect()->route('inventory')->with('success', 'Produced Successfully');

        } // if product not exist in inventory / first time produce
        else {

            $inventory = Inventory::updateOrCreate([
                'product_id' => $products->id,

            ], [
                'product_id' => $products->id,
                'product_quantity' => $request->get('require_quantity'),
                'cost_per_piece' => $costPerPiece,
                'user_account_id' => auth()->user()->user_account_id,
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

        return view('production.editrecipe', compact('parent_product'))->with('products', $products)->with('inventory_productIds', $inventory_productIds);

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
        $inventories = Inventory::latest()->where('user_account_id', auth()->user()->user_account_id)->with(['products.parent_product', 'products.attributes.attributeHeads'])->get();

        return view('inventory.showinventory')->with("inventories", $inventories);

    }

    public function createReadyMadeProduct()
    {
//        $sizes = Size::all();
        $attributeHeads = Attribute_head::with('attributes')->where('user_account_id', auth()->user()->user_account_id)->get();
        $categories = Category::where('user_account_id', auth()->user()->user_account_id)->get();

        return view('production.createreadymadeproduct')->with('categories', $categories)->with('attributeHeads', $attributeHeads);

    }

    //CreateReadyMadeProductRequest request class
    public function storeReadyMadeProduct(CreateReadyMadeProductRequest $request)
    {

        $attributes = $request->attribute;

        foreach ($attributes as $attribute) {
//            dump($attribute['attribute_id']);


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
            'brand_name' => request('brand_name'),
            'user_account_id' => auth()->user()->user_account_id,
            'user_id' => auth()->user()->id

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

    public function assignInventory($id)
    {
        $product = Product::find($id);

        $outlets = Outlet::where('user_account_id', auth()->user()->user_account_id)->latest()->get();
        return view('inventory.assigning', compact('outlets'))->with('product', $product);

    }

    public function assigning(Request $request, $id)
    {

        $product = Product::with('inventories')->find($id);
//         dd($product->inventories);
        foreach ($product->inventories as $product_inventory) {
            $selling_price = $product_inventory->selling_price_per_piece;
        }
        $product->outlets()->attach($request->outlet_id, ['product_quantity' => $request->product_quantity, 'status' => '1',
            'assigned_by_user_id' => auth()->user()->id, 'received_by_user_id' => null,
            'selling_price' => $selling_price]);

        return redirect()->back()->with('message', 'assigned sucessfully');

    }

    public function showOutgoingProduct()
    {
        $all_outgoing_product_to_outlets = [];
        $all_product_detail = [];
        $total_orders = 0;
        // fetching outgoing/assigned products from pivot table (relation method is outlets).
        $products = Product::with(['outlets'])->where('user_account_id', auth()->user()->user_account_id)->get();

        foreach ($products as $product) {

            $outgoing_product_to_outlets = $product->outlets;
//            dd($outgoing_product_to_outlets);

            foreach ($outgoing_product_to_outlets as $key => $outgoing_product_to_outlet) {
                $total_orders++;
                array_push($all_outgoing_product_to_outlets, $outgoing_product_to_outlet);

                $product_detail = Product::with(['attributes.attributeHeads', 'parent_product.category'])->where('id', $outgoing_product_to_outlet->pivot->product_id)->get();
                array_push($all_product_detail, $product_detail[0]);
            }
        }


//        foreach ($all_outgoing_product_to_outlets as $key2 => $all_outgoing_product_to_outlet) {
//            dump($all_outgoing_product_to_outlet->pivot->id);
//                dd('stop');

//            dump($all_product_detail[$key2]->attributes[0]->id);
//            dump($all_product_detail[$key2]->parent_product->title);
//
////            dump($all_outgoing_product_to_outlet->id);
//        }

        return view('inventory.showoutgoingproduct', compact(['all_outgoing_product_to_outlets', 'all_product_detail']));


    }

    public function cancelAssignedProduct($id, $pivot_id)
    {
        $products = Product::findOrFail($id);

        $products->outlets()->wherePivot('id', $pivot_id)->detach();
        return redirect()->back()->with('success', 'Canceled Assigned Inventory');

    }

    public function sales()
    {
        $all_outgoing_product_to_outlets = [];
        $all_product_detail = [];
        $cost_price = [];
        $total_sale = 0;
        $total_profit = 0;
        $success_order = 0;
        $total_order = 0;
        // fetching outgoing/assigned products from pivot table (relation method is outlets).
        $products = Product::with(['outlets'])->where('user_account_id', auth()->user()->user_account_id)->get();

        foreach ($products as $product) {
            $total_order += $product->outlets->count();
            $outgoing_product_to_outlets = $product->outlets()->wherePivot('status', 2)->get();

            $success_order += $outgoing_product_to_outlets->count();

            foreach ($outgoing_product_to_outlets as $key => $outgoing_product_to_outlet) {
                $total_sale += $outgoing_product_to_outlet->pivot->total_amount;

                array_push($all_outgoing_product_to_outlets, $outgoing_product_to_outlet);

                $product_detail = Product::with(['inventories', 'attributes.attributeHeads', 'parent_product.category'])->where('id', $outgoing_product_to_outlet->pivot->product_id)->get();
                array_push($all_product_detail, $product_detail[0]);

                $profit = $product_detail[0]->inventories[0]->selling_price_per_piece - $product_detail[0]->inventories[0]->cost_per_piece;

                $total_profit += $profit * $outgoing_product_to_outlet->pivot->product_quantity;

//                $success_order ++;
            }
        }
        return view('sale.sales', compact(['all_outgoing_product_to_outlets', 'all_product_detail', 'total_sale', 'total_profit', 'success_order', 'total_order']));


    }

    public function outletsOrders()
    {

        $all_outgoing_product_to_outlets = [];
        $all_product_detail = [];
        $total_orders = 0;
        // fetching outgoing/assigned products from pivot table (relation method is outlets).
        $products = Product::with(['outlets'])->where('user_account_id', auth()->user()->user_account_id)->get();

        foreach ($products as $product) {

//            $outgoing_product_to_outlets = $product->outlets;
//            $outgoing_product_to_outlets = $product->outlets()->where('manager_email',auth()->user()->email)->get();
            $outgoing_product_to_outlets = $product->outlets()->where('manager_email', 'ali123@gmail.com')->get();


            foreach ($outgoing_product_to_outlets as $key => $outgoing_product_to_outlet) {
                array_push($all_outgoing_product_to_outlets, $outgoing_product_to_outlet);

                $product_detail = Product::with(['attributes.attributeHeads', 'parent_product.category'])->where('id', $outgoing_product_to_outlet->pivot->product_id)->get();
                array_push($all_product_detail, $product_detail[0]);
            }
        }

//dd('stop running');
        return view('inventory.outletorder', compact(['all_outgoing_product_to_outlets', 'all_product_detail']));


    }

    public function receivingOrder(Request $request, $id, $pivot_id)
    {

        //for cancel order
        if ($request->cancel) {

            $products = Product::findOrFail($id);

            $products->outlets()->wherePivot('id', $pivot_id)->updateExistingPivot($pivot_id, ['rejected_by_user_id' => auth()->user()->id, 'rejected_date' => now(), 'status' => 3]);
            return redirect()->back()->with('success', 'Order is Canceled ');
        }
        //received orders
        if ($request->Received) {

            $products = Product::findOrFail($id);

            $products->outlets()->wherePivot('id', $pivot_id)->updateExistingPivot($pivot_id, ['received_by_user_id' => auth()->user()->id, 'received_date' => now(), 'status' => 2]);
            return redirect()->back()->with('success', 'Order is Received  ');
        }

    }
//    public function shippingCharges(){
//
//
//    }


}
