<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondStone extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'second_stone_type',
        'second_stone_color',
         'second_stone_carat',
         'second_stone_mm',
         'second_stone_gr',
        'second_stone_clarity',
        'second_stone_cut',
        'second_stone_shape',
    ];
}
