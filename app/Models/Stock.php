<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


//use OwenIt\Auditing\Contracts\Auditable;

class Stock extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory;


//    use SoftDeletes;
//    use \OwenIt\Auditing\Auditable;
    protected $table = 'stocks';
    protected $fillable = ['items', 'price', 'unit_id', 'user_id', 'quantity'];//, 'user_id'

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_stocks', 'stock_id', 'product_id');
    }
    // Stock relationship with units
//    public function unit (){
//
//        return $this->belongsToMany(Unit::class, 'product_stock', 'stock_id', 'unit_id');
//    }
// This relationship use for stocks history and stocks units in index pages etc...
    public function unit()
    {

        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    //stock class has many relation with stock_history
    public function history()
    {
        return $this->hasMany(Stock_history::class);
    }

    /*stock class has many relation with products table */
    public function product_relation()
    {
        return $this->belongsToJson('App\Models\Product', 'recipe[]->product_id');
        //return $this->belongsToJson('App\Models\Product', 'id');
//        return $this->belongsTo(Product::class );
//        return $this->belongsTo(Product::class);
    }
}
