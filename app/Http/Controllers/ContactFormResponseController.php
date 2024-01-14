<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormResponse;

class ContactFormResponseController extends Controller
{
    //CRUD for contact form responses. One function that creates a response to a certain contact form, and one that deletes a response and one that edits a response.
    public function showAdminContactForms()
    {
        return view('admin.contact-forms.show', [
            'contactFormResponses' => ContactFormResponse::all(),
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'contact_form_id' => 'required|integer',
            'response' => 'required|string|max:255',
        ]);
        if (!$validated['contact_form_id'] || !$validated['response']) {
            return redirect()->route('contact')->withErrors(['error' => 'Contact form id and response are required']);
        } else {
            $contactFormResponse = new ContactFormResponse();
            $contactFormResponse->contact_form_id = $validated['contact_form_id'];
            $contactFormResponse->response = $validated['response'];
            $contactFormResponse->save();
            return redirect()->route('admin.contact-forms');
        }
    }
}
//TODO: If time, complete
