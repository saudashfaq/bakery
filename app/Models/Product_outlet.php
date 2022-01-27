<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_outlet extends Model
{
    use HasFactory;
    protected $table = 'product_outlets';
    protected  $fillable = ['product_id','outlet_id','product_quantity','status','assigned_by_user_id','received_by_user_id'
    ,'rejected_by_user_id', 'selling_price', 'total_amount',  'received_date','rejected_date'];

    public function products(){

        return $this->belongsToMany(Product::class );
    }
}
