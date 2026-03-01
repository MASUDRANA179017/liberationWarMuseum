<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_name',
        'slug',
        'synopsis',
        'director_name',
        'video',
        'status',
        'film_type',
    ];
    protected $casts = [
        'film_type' => 'array',
    ];
    public function images()
    {
        return $this->hasMany(FilmImage::class);
    }
}
