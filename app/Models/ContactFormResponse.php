<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormResponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'content',
        'admin_id',
        'contact_form_id',
    ];
    public function admin()
    {
        return $this->belongsTo(admin::class, 'admin_id');
    }
    public function contact_form()
    {
        return $this->belongsTo(ContactForm::class, 'contact_form_id');
    }
}
