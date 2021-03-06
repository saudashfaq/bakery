<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Product extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory;

    protected $table = 'Products';

//    protected $primaryKey  = 'recipe.stock_id';
//    protected $foreignKey = 'stock_id';
    protected $fillable = ['parent_product_id']; //'price'

    public function stocks()
    {

        return $this->belongsToMany(Stock::class, 'product_stocks', 'product_id', 'stock_id' )->withPivot('quantity' , 'unit_id')->withTimestamps();;
    }

    public function attributes (){

        return $this->belongsToMany(Attribute::class , 'product_attributes' , 'product_id' , 'attribute_id');
    }
    public function outlets(){

        return $this->belongsToMany(Outlet::class ,'product_outlets' , 'product_id','outlet_id')->withPivot('id',
            'product_quantity' ,
            'status' ,
            'assigned_by_user_id',
            'received_by_user_id' ,
            'rejected_by_user_id',
            'selling_price',
            'total_amount',
            'received_date',
            'rejected_date')->withTimestamps();
    }
//->as('subscription')
//->withTimestamps();

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'product_stocks', 'product_id', 'unit_id');
    }

    /*relation for size table*/
//    public function sizes()
//    {
//        return $this->belongsToMany(Size::class, 'product_stocks', 'product_id', 'size_id');
//    }
         //Todo this relation use for save recipe in bridge table and related key is stock_id ...
    public function product_stocks()
    {
        return $this->belongsToMany(Product_stock::class, 'product_stocks', 'product_id', 'stock_id');
    }


    // create products relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*product table has many relation with inventory table*/
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    //todo
    public function unit()
    {

        return $this->belongsTo(Unit::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /*public function parent_products()
    {
            return $this->belongsToMany(Parent_product::class , 'product_stocks'  , 'product_id' , 'stock_id');
    }*/
    public function parent_product()
    {
            return $this->belongsTo(Parent_product::class);
    }


}
