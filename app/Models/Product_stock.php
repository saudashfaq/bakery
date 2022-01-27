<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_stock extends Model
{
    use HasFactory;
    protected $table = 'product_stocks';
    protected $fillable = ['product_id' , 'stock_id', 'unit_id' , 'quantity'];


    /*    public function stocks()
    {
        return $this->belongsToMany(Stock::class , 'product_stock', 'id', 'stock_id');
    }*/


}

