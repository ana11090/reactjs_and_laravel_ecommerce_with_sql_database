<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'product_name',
        'product_image_1',
        'product_size',
        'product_pieces',
        'product_pieces',
        'discount_code',
        'discount_procent'
           
        
    ];
}
