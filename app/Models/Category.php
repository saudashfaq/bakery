<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable=['name'];
    // relative users has many po
    public function produts (){
        return $this->hasMany(Product::class);
    }
}
