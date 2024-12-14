<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->from($validated['email'], $validated['name'])
                   ->to('levelupcodingsa@gmail.com')
                   ->subject('New Contact Form Submission from ' . $validated['name']);
        });

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
