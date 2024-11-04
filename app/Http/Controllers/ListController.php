<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class ListController extends Controller
{
    public function index()
    {
        $registrations = Registration::all(); // Fetch all registrations

        return view('list', compact('registrations'));
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id); // Find the registration by ID
        $registration->delete(); // Delete the registration

        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully');
    }
}
