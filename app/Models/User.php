<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'avatar',
        'isAdmin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the contact forms for the user.
     */
    public function contact_forms()
    {
        return $this->hasMany(ContactForm::class, 'author_id', 'id');
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
     * Get the faq responses for the user.
     */
    public function faq_categories()
    {
        return $this->hasMany(FaqCategory::class, 'admin_id', 'id');
    }
    //TODO: Transfer the relationships to Admin Model in branch feature-admin
}
