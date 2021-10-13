<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable=['name'];

    // relative users has many post
    public function produts (){
        return $this->hasMany(Product::class);
    }
}
