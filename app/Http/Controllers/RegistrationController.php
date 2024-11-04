<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Admission;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return view('registrations.index', compact('registrations'));
    }

    public function showcourses()
    {   
        $confirmedAdmissions = Admission::where('course', 'C')->get();
        return view('registrations.clist', compact('confirmedAdmissions'));
    }
   
    public function showcourses1()
    {   
        $confirmedAdmissions = Admission::where('course', 'C++')->get();
        return view('registrations.c++list', compact('confirmedAdmissions'));
    }
  
    public function showcourses2()
    {   
        $confirmedAdmissions = Admission::where('course', 'Php')->get();
        return view('registrations.phplist', compact('confirmedAdmissions'));
    }

    public function showcourses3()
    {   
        $confirmedAdmissions = Admission::where('course', 'Java')->get();
        return view('registrations.Javalist', compact('confirmedAdmissions'));
    }
    public function showcourses4()
    {   
        $confirmedAdmissions = Admission::where('course', 'Aws')->get();
        return view('registrations.Awslist', compact('confirmedAdmissions'));
    }
    public function showcourses5()
    {   
        $confirmedAdmissions = Admission::where('course', 'Angular')->get();
        return view('registrations.Angularlist', compact('confirmedAdmissions'));
    }
   
    

    public function showcourses6 ()
    {   
        $confirmedAdmissions = Admission::where('course', 'Spring-boot')->get();
        return view('registrations.springlist', compact('confirmedAdmissions'));
    }
    
    
    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'course' => 'required|string|max:255',
            'installment1' => 'nullable|numeric',
            'installment2' => 'nullable|numeric',
            'total_fees' => 'required|numeric',
            'remaining_fees' => 'required|numeric',
        ]);
    
        // Find the registration record
        $registration = Registration::findOrFail($id);
    
        // Calculate remaining fees
        $total_fees = $request->input('total_fees');
        $installment1 = $request->input('installment1', 0);
        $installment2 = $request->input('installment2', 0);
        $remaining_fees = $total_fees - ($installment1 + $installment2);
    
        // Create or update admission record
        $admission = Admission::updateOrCreate(
            ['email' => $registration->email], // Use email as unique identifier
            [
                'email' => $request->input('email'),
                'full_name' => $request->input('full_name'),
                'phone_number' => $request->input('phone_number'),
                'course' => $request->input('course'),
                'installment1' => $request->input('installment1'),
                'installment2' => $request->input('installment2'),
                'total_fees' => $total_fees,
                'remaining_fees' => $remaining_fees,
            ]
        );
    
        // Delete the registration record
        $registration->delete();
    
        // Redirect to index page with success message
        return redirect()->route('registrations.index')->with('success', 'Registration updated and transferred to admissions successfully');
    }
    
    public function destroy1($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->delete();

        return redirect()->route('registrations.index')->with('success', 'Admission deleted successfully.');
    }

    public function destroy($id)
    {
        // Find the registration by ID
        $registration = Registration::findOrFail($id);

        // Delete the registration
        $registration->delete();

        // Redirect to the index page with a success message
        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully');
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.confirm', compact('registration'));
    }
    
    public function confirmedIndex()
    {
        $confirmedAdmissions = Admission::all(); // Adjust logic based on your actual schema
        return view('registrations.confirm', compact('confirmedAdmissions'));
    }

    public function editConfirm($id)
    {
        $admission = Admission::findOrFail($id);
        return view('registrations.edit_confirm', compact('admission'));
    }

    public function showEditForm($id)
    {
        $admission = Admission::findOrFail($id);
        return view('registrations.edit_confirm', compact('admission'));
    }

    public function saveUpdates(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        $admission = Admission::findOrFail($id);
        $admission->fill($request->all());
        $admission->save();

        return redirect()->route('registrations.index')->with('success', 'Admission updated successfully.');
    }

    public function updateAdmission(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);
        $admission->fill($request->all());
        $admission->save();

        return redirect()->route('registrations.index')->with('success', 'Admission updated successfully.');
    }

    public function showConfirmedRegistrations()
    {
        $confirmedAdmissions = Admission::where('status', 'confirmed')->get();
        return view('registrations.confirm', compact('confirmedAdmissions'));
    }
 
}
