<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store3(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new enquiry record
        Enquiry::create($validated);

        // Redirect to a thank you page or back to the form with a success message
        return redirect()->back()->with('success', 'Your enquiry has been submitted successfully!');
    }
}
