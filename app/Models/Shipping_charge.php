<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_charge extends Model
{
    use HasFactory;
    protected $table = 'shipping_charges';
    protected $fillable = ['user_id','user_account_id' , 'country', 'province' , 'city','amount'
        ];
}
