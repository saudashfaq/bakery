<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    use HasFactory;
    protected $table = 'inventories';
    protected $fillable= ['finished_goods' , 'product_id'];



    public function product(){
        return $this->belongsTo('App\Models\Product' ,'product_id','id');
    }
}

