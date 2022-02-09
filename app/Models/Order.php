<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'user_account_id',
        'subtotal',
        'tax',
        'delivery_charges',
        'discount',
        'total',
        'payment_method',
        'status'
    ];
  }
