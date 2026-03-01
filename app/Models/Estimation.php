<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;
   protected $fillable = [
        'product_id', 'film_id', 'price_per_sft', 'color','film_type',
    ];

    protected $casts = [
        'product_id'    => 'integer',
        'film_id'    => 'integer',
        'price_per_sft' => 'decimal:2',
    ];

    /* ---------------------------------
     | Relationships
     |----------------------------------*/
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    
   

}
