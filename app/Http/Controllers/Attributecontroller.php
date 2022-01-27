<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Attribute_head;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Size;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class Attributecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $attributeHeads = Attribute_head::with('attributes')->where('user_account_id' , auth()->user()->user_account_id)->latest()->get();
//        dd($attributeHeads);
//        foreach ($attributeHeads as $attributeHead){
//                dump($attributeHead->name);
//                foreach ($attributeHead->attributes  as $attributes ){
//                    dump($attributes->name);
//                }
//        }
//        dd('stop');
        return view('attribute.index')->with('attributeHeads', $attributeHeads);

    }

    public function createAttribute()
    {


        return view('attribute.createattribute');
    }

    public function storeAttribute(Request $request)
    {
//        dd(auth()->user()->user_account_id , auth()->user()->id);
        $this->validate($request , [

            'AttributeHead'=> 'required',
            'attribute'=> 'required'
        ]);

        $attributeHeads = Attribute_head::where('name', '=', $request->AttributeHead)->first();

        if ($attributeHeads == !null) {
            return redirect()->route('create.attribute')->with('error', 'Sorry this  ( ' . $request->AttributeHead . ' ) Attribute Head  is already exist');
        } else {

            $attributeHead = Attribute_head::create([
                'name' => request('AttributeHead'),
                'user_account_id'=> auth()->user()->user_account_id,
                'user_id' => auth()->user()->id,
            ]);


            foreach ($request->attribute as $attribute) {

                $attributes = new Attribute();
                $attributes->attribute_head_id = $attributeHead->id;
                $attributes->name = $attribute;
                $attributes->save();

            }
            return redirect()->route('create.attribute')->with('success', 'Attribute Created Successfully ');
        }
    }

    public function editAttribute($id)
    {
//        dd($id);
        $attributeHeads = Attribute_head::with('attributes')->where('id', '=', $id)->first();


        return view('attribute.editattribute')->with('attributeHeads', $attributeHeads);
    }

    public function updateAttribute(Request $request, $id)
    {
        $attributeHeads = Attribute_head::where('name', '=', $request->AttributeHead)->first();


        $attributeHead = Attribute_head::find($id);
        $attributeHead->name = $request->input('AttributeHead');

        $attributeHead->update();

            foreach ($request->attribute as $key => $attribute){
                $attribute_id = !empty($request->attribute_id[$key]) ? $request->attribute_id[$key] : null;
               Attribute::updateOrCreate([
                    'id' => $attribute_id,

                ], [
                    'attribute_head_id' => $id,
                    'name' => $attribute,

                ]);

            }
        return redirect()->route('attributes.index')->with('success', 'Attribute updated successfully');

    }

    /*for category */
    public function createCategory()
    {

        return view('attribute.createcategory');
    }

    public function storeCategory(Request $request)
    {
        $existedcategory = Category::where('name', '=', $request->name)->first();

        if ($existedcategory == !null) {
            return redirect()->route('create.category')->with('error', 'Sorry this  ( ' . $request->name . ' ) Category  is already exist');
        } else {
            $category = new Category();
            $category->name = $request->input('name');
            $category->user_id = auth()->user()->id;
            $category->user_account_id = auth()->user()->user_account_id;
            $category->save();
            return redirect()->route('create.category')->with('success', 'Category Created Successfully ');
        }
    }

}
