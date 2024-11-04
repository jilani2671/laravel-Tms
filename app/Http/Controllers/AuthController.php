<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Import the Registration model

class AuthController extends Controller
{
    public function registerSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'phone_number' => 'required|string|max:20|unique:registrations,phone_number',
            'date_of_birth' => 'required|date',
            'course' => 'required|string',
            'enquiries' => 'nullable|string',
            'agree_terms' => 'required|boolean'
        ]);
    
        // Check if the user already exists based on email or phone_number
        $existingUser = Registration::where('email', $validatedData['email'])
            ->orWhere('phone_number', $validatedData['phone_number'])
            ->first();
    
        if ($existingUser) {
            return redirect()->back()->with('error', 'User with this email or phone number already exists.');
        }
    
        try {
            Registration::create($validatedData);
            return redirect()->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to register. Please try again.');
        }
    }
    

}
