<?php

namespace App\Http\Controllers;

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
        $user = $request->user();

        $validated = $request->validate([
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);
        if(!$validated['subject'] || !$validated['content'])
            return redirect()->route('contact-form.show')->withErrors('Please fill in all fields');
        else{

                    $contactForm = new ContactForm();
                    $contactForm->subject = $request->input('subject');
                    $contactForm->content = $request->input('content');
                    $contactForm->author_id = $user->id;
                    $contactForm->save();

        }

        return view('contact-form.success');
    }



}
