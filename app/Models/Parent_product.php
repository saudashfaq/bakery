<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_product extends Model
{
    use HasFactory;

    protected $table = 'parent_products';
    protected $fillable = ['title', 'description', 'category_id','brand_name', 'image']; //, 'image'


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
