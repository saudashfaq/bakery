<?php

namespace App\Http\Controllers\Website;
//App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Shipping_charge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request, $user_acount, $id)
    {

        $user_account_id = (int)$id;

        $inventories = Inventory::latest()->where('user_account_id', $user_account_id)->with(['products.parent_product', 'products.attributes.attributeHeads'])->get();
        return view('website.index')->with("inventories", $inventories);

//       $inventories = Inventory::latest()->where('user_account_id', auth()->user()->user_account_id)->with(['products.parent_product', 'products.attributes.attributeHeads'])->get();


    }

    public function productDetail($id)
    {

        $inventory = Inventory::with(['products.parent_product', 'products.attributes.attributeHeads'])->find($id);

        return view('website.productdetail')->with("inventory", $inventory);

    }


    public function storeCart(Request $request)
    {

        $inventory = Inventory::with(['products.parent_product', 'products.attributes.attributeHeads'])
            ->findOrFail($request->input('inventory_id'));

        Cart::add(
            $inventory->product_id,
            $inventory->products->parent_product->title,
//            $inventory->products->parent_product->decription,
            $request->input('product_quantity'),
            $inventory->selling_price_per_piece,
        );
        return redirect()->back()->with('success', 'Product Add to cart successfully');


    }

    // for cart page
    public function cart(Request $request)
    {
//        $inventory = Inventory::with(['products.parent_product', 'products.attributes.attributeHeads'])->find($id);
        $cart_items = Cart::content();

        $shipping_charges = Shipping_charge::where('user_account_id', 1)->get();

        return view('website.cart', compact(['cart_items', 'shipping_charges']));
    }

    public function checkout(Request $request)
    {

        $cart_items = Cart::content();

        $shipping_charges = Shipping_charge::find($request->city);

        return view('website.checkout', compact(['cart_items']))->with('shipping_charges', $shipping_charges);
    }

    public function billingDetail(Request $request)
    {
        $cart_items = Cart::content();
        $total = Cart::total();
        $total = ((float)str_replace(',', '', $total));

        $customer = Customer::create([
            'user_account_id' => 1,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->Country,
            'city' => $request->city,
            'zip' => $request->zip,
            'street_address' => $request->street_address,
        ]);
//      $shipping_charges = Shipping_charge::find()
        $orders = new Order();
        if (in_array(!null, $request->bank_detail)) {
            $orders->customer_id = $customer->id;
            $orders->user_account_id = 1;
            $orders->subtotal = Cart::subtotal();
            $orders->tax = Cart::tax();
            $orders->delivery_charges = $request->shipping_charges;
            $orders->discount = 0;
            $orders->total = $total + $request->shipping_charges;
            $orders->payment_method = json_encode($request->bank_detail);
            $orders->status = 'received';
            $orders->save();
        } else {
            $orders->customer_id = $customer->id;
            $orders->user_account_id = 1;
            $orders->subtotal = Cart::subtotal();
            $orders->tax = Cart::tax();
            $orders->delivery_charges = $request->shipping_charges;
            $orders->discount = 0;
            $orders->total = $total + $request->shipping_charges;
            $orders->payment_method = $request->payment_method;
            $orders->status = 'receivable';
            $orders->save();
        }


        foreach ($cart_items as $cart_item) {

            Order_detail::create([
                'order_id' => $orders->id,
                'product_id' => $cart_item->id,
                'product_quantity' => $cart_item->qty,
                'status' => 1,
                'approved_by'=>null,
                'approved_date'=>null,
                'received_date'=>null,
                'rejected_date'=>null
        ]);
            }
                Cart::destroy();

        return redirect()->back()->with('success' , 'Order placed successfully' );


    }
    public function orderDetail()
    {
        $order_details = Order_detail::with(['orders', 'products.parent_product'])->latest()->get();


//        foreach ($order_details as $order_detail){
////           dump($order_detail->orders->payment_method);
//           dump($order_detail->orders->payment_method['bank_name']);
////           dump(gettype($order_detail->orders->payment_method));
////            if( gettype($order_detail->orders->payment_method) !== "string"){
//            if($order_detail->orders->payment_method['bank']){
//                dump('json');
//            }
//            else{
//                dump($order_detail->orders->payment_method);
//            }
//        }
//        dd('stop');
        return view('website.orderdetail',compact('order_details'));

    }

}
