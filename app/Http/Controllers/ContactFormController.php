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
    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();
        $contactForm = ContactForm::create($validated);
        $contactForm->fill($validated);
        $contactForm->user_id = Auth::id();
        $contactForm->save();
        return redirect()->route('contact-form.show')->with('success', 'Contact form submitted');
    }
}
