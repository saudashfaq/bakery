<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';
    protected $fillable = ['name', 'attribute_head_id'];

//    public function attributeHeads()
//    {
//        return $this->belongsTo(Attribute_head::class);
//    }
    public function attributeHeads()
    {

        return $this->belongsTo(Attribute_head::class, 'attribute_head_id', 'id');
    }

 }
