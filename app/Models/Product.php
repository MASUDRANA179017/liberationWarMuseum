<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'subtitle',
        'description',
        'applications',
        'benefits',
        'features',
        'image',
        'status',
        'price',
        'text_before_price',
        'text_after_price',
        'is_varient',   
        'color', 
    ];

    protected $casts = [
        'color' => 'array',   
    ];
}
