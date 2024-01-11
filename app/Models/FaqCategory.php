<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqQuestion;
use App\Models\FaqAnswer;

class FaqCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'faq_category_id'
    ];

    public function faqs(){
        return $this->hasMany(Faq::class);
    }



}
