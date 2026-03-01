<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    protected $table = 'exhibitions';

    protected $fillable = [
        'exhibition_title',
        'director_name',
        'synopsis',
        'video',
        'slug',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(ExhibitionCategory::class, 'exhibition_category_id');
    }
    public function images()
    {
        return $this->hasMany(ExhibitionImage::class);
    }
}
