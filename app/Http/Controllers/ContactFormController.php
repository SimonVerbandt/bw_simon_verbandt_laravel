<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function show()
    {
        return view('contact-form.show');
    }
    public function submit(Request $request): View
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'nullable|integer',
            'author_type' => 'nullable|string',
        ]);
        $author_id = Auth::id();
        $author_type = 'user';
        if(!Auth::check()){
            $author_id == null;
            $author_type = 'guest';
        }
        $contactForm = ContactForm::create([
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'author_id' => $author_id,
            'author_type' => $author_type,
        ]);
        $contactForm->save();
        return view('contact-form.success');
    }
}
