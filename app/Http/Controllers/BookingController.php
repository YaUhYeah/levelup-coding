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

        // Create or find client
        $client = \App\Models\Client::firstOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'ndis_number' => $validated['ndis_number'] ?? null,
            ]
        );

        // Calculate start and end time
        $startTime = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['time']);
        $endTime = $startTime->copy()->addHour(); // Default 1-hour session

        // Create booking
        $booking = Booking::create([
            'client_id' => $client->id,
            'session_type' => $validated['session_type'],
            'start_time' => $startTime,
            'end_time' => $endTime,
            'is_ndis' => $validated['is_ndis'] ?? false,
            'status' => 'pending',
            'rate' => 150.00, // Default rate, should be configurable
            'notes' => $validated['message'],
            'session_link' => $validated['session_type'] === 'online' ? \Str::uuid() : null,
        ]);

        // Send confirmation email
        Mail::raw(
            "New booking request:\n\n" .
            "Name: {$validated['name']}\n" .
            "Email: {$validated['email']}\n" .
            "Phone: {$validated['phone']}\n" .
            "Date: {$startTime->format('Y-m-d')}\n" .
            "Time: {$startTime->format('H:i')}\n" .
            "Session Type: {$validated['session_type']}\n" .
            "NDIS: " . ($validated['is_ndis'] ? 'Yes' : 'No') . "\n" .
            "Message: {$validated['message']}\n\n" .
            ($validated['session_type'] === 'online' ? "Session Link: " . url("/session/{$booking->session_link}") : ""),
            function ($message) use ($validated) {
                $message->from($validated['email'], $validated['name'])
                       ->to('levelupcodingsa@gmail.com')
                       ->subject('New Booking Request from ' . $validated['name']);
            }
        );

        return back()->with('success', 'Thank you for your booking request. We will confirm your session shortly!');
    }
}
