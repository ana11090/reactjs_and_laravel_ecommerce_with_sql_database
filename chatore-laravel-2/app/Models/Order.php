<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        
               'product_size','user_id',
               'product_pieces','product_image_1',
               'product_price',
               'product_sale',
               'discount_code',
               'product_final_price',
               'id_address',
               'discount_procent',
               'discount_sum',
               'tracking'
           
        
    ];

    protected $casts = [
        'order' => 'json'
    ];
}
