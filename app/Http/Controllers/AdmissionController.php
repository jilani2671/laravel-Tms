<?php
namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

use DB;

class AdmissionController extends Controller
{
  
    public function edit_confirm($id)
    {
        $admission = Admission::findOrFail($id);
        return view('registrations.confirm', compact('admission'));
    }

    // Show the edit form
    public function showEditForm($id)
    {
        $admission = Admission::findOrFail($id);
        return view('registrations.edit_confirm', compact('admission'));
    }
    public function updateAdmission(Request $request, $id)
   {
    $admission = Admission::findOrFail($id);
    $admission->full_name = $request->input('full_name');
    $admission->email = $request->input('email');
    $admission->phone_number = $request->input('phone_number');
    $admission->date_of_birth = $request->input('date_of_birth');
    $admission->course = $request->input('course');
    $admission->enquiries = $request->input('enquiries');
    $admission->installment1 = $request->input('installment1');
    $admission->installment2 = $request->input('installment2');
    $admission->installment3 = $request->input('installment3');
    $admission->total_fees = $request->input('total_fees');
    $admission->remaining_fees = $request->input('remaining_fees');
    $admission->save();

    return redirect()->route('registrations.confirm')->with('success', 'Admission updated successfully');
   }
 
    // Update the record in the database
    public function saveUpdates(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'course' => 'required|string|max:255',
            'enquiries' => 'nullable|string|max:500',
            'installment1' => 'nullable|string|max:255',
            'installment2' => 'nullable|string|max:255',
            'installment3' => 'nullable|string|max:255',
        ]);

        $admission = Admission::findOrFail($id);
        $admission->update($request->all());

        return redirect()->route('registrations.index')->with('success', 'Admission updated successfully.');
    }

   
}