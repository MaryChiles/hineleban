<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'image',
        'quantity',
        'price',
        'order_num',
        'payment_method',
        'bank_name',
        'account_num',
        'enable_customer',
        'created_at'
    ];

   
}
