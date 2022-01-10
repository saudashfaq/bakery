<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_head extends Model
{
    use HasFactory;


    protected $table = 'attribute_heads';
    protected $fillable = ['name' , 'user_account_id' , 'user_id'];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
