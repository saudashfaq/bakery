<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected  $fillable=['user_account_id','outlet_name','type','branch_manager_name','manager_email','location'];

//    public function products(){
//        return $this->belongsToMany(Product::class ,'product_outlets' , 'outlet_id','product_id');
//    }
}
