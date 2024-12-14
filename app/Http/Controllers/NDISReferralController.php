<?php

namespace App\Http\Controllers;

use App\Models\NDISReferral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NDISReferralController extends Controller
{
    public function index()
    {
        return view('pages.ndis-referral');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'ndis_number' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'support_needs' => 'required|string',
            'goals' => 'required|string',
            'referrer_name' => 'nullable|string|max:255',
            'referrer_organization' => 'nullable|string|max:255',
            'referrer_phone' => 'nullable|string|max:20',
            'referrer_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        // Create referral
        $referral = NDISReferral::create($validated);

        // Send notification email
        Mail::raw("New NDIS referral:\n\nName: {$validated['first_name']} {$validated['last_name']}\nEmail: {$validated['email']}\nPhone: {$validated['phone']}\nNDIS Number: {$validated['ndis_number']}\nDate of Birth: {$validated['date_of_birth']}\n\nSupport Needs:\n{$validated['support_needs']}\n\nGoals:\n{$validated['goals']}\n\nReferrer Details:\nName: {$validated['referrer_name']}\nOrganization: {$validated['referrer_organization']}\nPhone: {$validated['referrer_phone']}\nEmail: {$validated['referrer_email']}\n\nNotes:\n{$validated['notes']}", 
            function ($message) use ($validated) {
                $message->from($validated['email'], "{$validated['first_name']} {$validated['last_name']}")
                       ->to('levelupcodingsa@gmail.com')
                       ->subject('New NDIS Referral from ' . "{$validated['first_name']} {$validated['last_name']}");
            }
        );

        return back()->with('success', 'Thank you for your referral. We will contact you shortly to discuss the next steps.');
    }
}
