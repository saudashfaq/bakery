<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'user_account_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'city',
        'zip',
        'street_address'
        ];
}
