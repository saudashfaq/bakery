<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

//use OwenIt\Auditing\Contracts\Auditable;

class Stock extends Model implements Auditable

{
    use HasFactory;
//    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'stocks';
    protected $fillable = ['product' , 'price' ,'unit_id', 'user_id','quantity'];//, 'user_id'
    // Stock relationship with units
    public function unit (){

        return $this->belongsTo(Unit::class);
    }
    //stock class has many relation with stock_history
    public function history()
    {
        return $this->hasMany(Stock_history::class);
    }
    /*stock class has many relation with products table */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
