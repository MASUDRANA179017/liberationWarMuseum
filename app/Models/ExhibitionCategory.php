<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class, 'project_category_id');
    }
}
