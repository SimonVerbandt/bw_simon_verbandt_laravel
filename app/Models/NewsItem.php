<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'content',
        'published_at',
        'author_id',
        'slug',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
