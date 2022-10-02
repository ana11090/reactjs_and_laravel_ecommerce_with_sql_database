<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
             'product_image_1' ,
             'product_image_2' ,
             'product_image_3' ,
             'product_image_4' ,
             'product_language' ,
             'product_name' ,
             'product_category' ,
             'product_collection' ,
             'product_set_name' ,
             'product_state' ,
             'gender_recommendation' ,
             'product_cost' ,
             'product_price' ,
             'product_description' ,
    ];

    public function salesCategory(){
        return $this->hasOne(SalesGroup::class, 'category', 'current_product');
    }
}
