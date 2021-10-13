<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_history extends Model
{

    use HasFactory;
    protected $table = 'Stock_histories';
    public $primaryKey = 'id';
    public $foreignkey = 'stock_id';

    protected $fillable = ['stock_id' , 'new_price' ,'old_price'];

    public function  stocks (){

        return $this->belongsTo('App\Models\Stock' ,'stock_id','id');
    }
}
