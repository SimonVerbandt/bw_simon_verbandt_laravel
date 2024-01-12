<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'admin_id',

    ];

    public function faqs(){
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }



}
