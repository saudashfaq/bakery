<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity',
        'status',
        'approved_by',
        'approved-date',
        'received_date',
        'rejected_date'
    ];

    public function orders(){
        return $this->belongsTo(Order::class ,'order_id','id');
    }
    public function products(){

        return $this->belongsTo(Product::class , 'product_id' ,'id');
    }

}
