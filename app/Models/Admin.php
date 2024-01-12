<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the contact form responses for the user.
     */
    public function contact_form_responses()
    {
        return $this->hasMany(ContactFormResponse::class, 'admin_id', 'id');
    }
    /**
     * Get the news items for the user.
     */
    public function news_items()
    {
        return $this->hasMany(NewsItem::class, 'author_id', 'id');
    }
    /**
     * Get the faqs for the user.
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class, 'author_id', 'id');
    }
    /**
     * Get the faq categories for the user.
     */
    public function faq_categories()
    {
        return $this->hasMany(FaqCategory::class, 'admin_id', 'id');
    }
}
