<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_id',
        'image',
        'status',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
