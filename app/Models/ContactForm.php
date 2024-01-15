<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'content',
        'author_id',
        'author_type',
    ];

    public function author()
    {
        return $this->morphTo();
    }

}
