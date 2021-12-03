<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected  $fillable = ['name'];
    use HasFactory;

    // relative
    public function stock (){
        return $this->hasMany(Stock::class);
    }
    public function product_stock (){
        return $this->hasMany(Product_stock::class);
    }

}
