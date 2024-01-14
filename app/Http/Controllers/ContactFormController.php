<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    //create CRUD operations for the contact form
    public function show()
    {
        return view('contact-form.show');
    }
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $contactForm = ContactForm::create([
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'author_id' => Auth::id(),
        ]);
        $contactForm->save();
        return redirect()->route('contact-form.show')->with('success', 'Contact form submitted');
        //TODO: Format all controllers so they behave the same as this one
    }
}
