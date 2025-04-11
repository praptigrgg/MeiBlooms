<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Save to DB
        $contact = ContactMessage::create($request->only('name', 'email', 'message'));

        // Send email
        Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {
            $m->to('your-email@example.com') // Change this
              ->subject('New Contact Message from ' . $contact->name);
        });

        return back()->with('success', 'Thank you for reaching out. We’ll get back to you soon!');
    }
}

