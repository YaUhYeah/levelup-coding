<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.booking');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'session_type' => 'required|in:online,in-person',
            'is_ndis' => 'boolean',
            'ndis_number' => 'required_if:is_ndis,true',
            'message' => 'nullable|string',
        ]);

        // Create booking
        $booking = Booking::create($validated);

        // Send confirmation email
        Mail::raw("New booking request:\n\nName: {$validated['name']}\nEmail: {$validated['email']}\nPhone: {$validated['phone']}\nDate: {$validated['date']}\nTime: {$validated['time']}\nSession Type: {$validated['session_type']}\nNDIS: " . ($validated['is_ndis'] ? 'Yes' : 'No') . "\nMessage: {$validated['message']}", 
            function ($message) use ($validated) {
                $message->from($validated['email'], $validated['name'])
                       ->to('levelupcodingsa@gmail.com')
                       ->subject('New Booking Request from ' . $validated['name']);
            }
        );

        return back()->with('success', 'Thank you for your booking request. We will confirm your session shortly!');
    }
}
