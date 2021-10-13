<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'Products';
    protected $fillable  = ['title', 'description','size','image','category_id' , 'item' , 'quantity' , 'unit','recipe']; //'price'
//    protected $casts = [ 'recipe'=> 'array'];

    // create products relationship with category
    public function category (){

        return $this->belongsTo(Category::class);
    }

    public function  stocks (){

        return $this->belongsTo('App\Models\Stock' ,'stock_id','id');
    }

        /*product table has many relation with inventory table*/
    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

        /*json value */
    public function getRecipeAttribute($value){

    return !empty($value) ? json_decode($value , true):[];
        }


}
