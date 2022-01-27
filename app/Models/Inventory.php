<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    use HasFactory;
    protected $table = 'inventories';

    protected $fillable= ['product_id','product_quantity','cost_per_piece','selling_price_per_piece' , 'user_account_id' ,'user_id' ];




    public function products(){
        return $this->belongsTo('App\Models\Product' ,'product_id','id');
    }

}

