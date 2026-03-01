<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBlogComment extends Model
{
    use HasFactory;
     protected $fillable = [
        'news_blog_id',
        'name',
        'email',
        'message',
        'comment_like',
    ];

    public function newsBlog()
    {
        return $this->belongsTo(Blog::class);
    }
}
