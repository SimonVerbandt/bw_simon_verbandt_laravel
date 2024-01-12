<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'slug',
        'category_id',
        'admin_id',

    ];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

}
