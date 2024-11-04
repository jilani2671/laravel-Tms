<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegis;
use App\Models\BAwork;
use App\Models\Admin; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
use App\Models\Enquiry;


class user_auth extends Controller
{
    public function store(Request $request)
    {
        // Log request data
        \Log::info('Request Data: ', $request->all());
    
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_regis,email',
            'phone_no' => 'required|string|max:20',
            'password' => 'required|string|min:4',
        ]);
    
        // Log validated data
        \Log::info('Validated Data: ', $validatedData);
    
        // Create a new user record in the database
        $user = UserRegis::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_no' => $validatedData['phone_no'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        // Log created user data
        \Log::info('Created User: ', $user->toArray());
    
        // Return JSON response
        return response()->json(['message' => 'Successfully registered!']);
    }

    public function login(Request $request)
    {    
        //BA login 
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed, store user in session
            $user = Auth::user();
            $request->session()->put('user', $user);

            // Redirect to intended page
            return redirect()->intended('/bi/BAwork');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }

    public function bastore(Request $request)
    {   

        //for the project details stores 
        // Validate the form input
        $request->validate([
            'project_name' => 'required|string|max:255',
            'tech' => 'required|string|max:255',
            'status' => 'required|string',
            'dev_team' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        // Create a new BAwork entry
        BAwork::create([
            'project_name' => $request->input('project_name'),
            'tech' => $request->input('tech'),
            'status' => $request->input('status'),
            'dev_team' => $request->input('dev_team'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'business_analyst_name' => $request->input('business_analyst_name'),
        ]);

        // Redirect or return response
        // return redirect()->back()->with('success', 'Project details have been saved!');
        return response()->json(['success' => true]);
    }
    public function showProjects()
    {
         
        // Fetch projects from the BAwork model
        $projects = BAwork::all();
        
        // Pass data to the view
        return view('bi.project_report', ['projects' => $projects]);
    }
 
    public function edit($id)
    {
        $project = BAwork::findOrFail($id);
        return view('bi.update_BAwork', compact('project'));
    }
    
    public function update(Request $request, $id)
    {
        // Log request data
        \Log::info('Update Request Data: ', $request->all());

        // Validate incoming request data
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'tech' => 'required|string|max:255',
            'status' => 'required|string',
            'dev_team' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        // Find the project by ID
        $project = BAwork::findOrFail($id);

        // Update the project details
        $project->update($validatedData);

        // Log updated project data
        \Log::info('Updated Project: ', $project->toArray());

        // Return success response or redirect
        return redirect()->route('projects.show')->with('success', 'Project details have been updated successfully!');
    }

    public function indexs()
    {
        $projects = BAwork::where('status', 'ongoing')->get();
        return view('bi.ongoing_project', compact('projects'));
    }
    
    public function indexs2()
    {
        $projects = BAwork::where('status', 'pending')->get();
        return view('bi.pending_project', compact('projects'));
    }
    
    public function indexs3()
    {
        $projects = BAwork::where('status', 'upcoming')->get();
        return view('bi.upcoming_project', compact('projects'));
    }

    public function indexs4()
    {
        $projects = BAwork::where('status', 'completed')->get();
        return view('bi.completed_project', compact('projects'));
    }

    public function loginAdmin(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user using plain text password
        $admin = Admin::where('email', $credentials['email'])->first();
    
        if ($admin && $admin->validatePassword($credentials['password'])) {
            // Authentication passed, store user in session
            Auth::login($admin);
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed, store an error message in session
            return back()->withErrors(['email' => 'Invalid credentials'])
                         ->withInput()
                         ->with('loginError', 'Incorrect email or password.');
        }
    }
    
    

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:login_admin',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create a new admin without hashing the password
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Store the password in plain text
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    
   
    public function showDashboard() {
        return view('dashboard');
    }
    
    public function getDashboardData() {
        $admissionsData = DB::table('admissions')
            ->select('course', DB::raw('count(*) as count'))
            ->groupBy('course')
            ->get();
    
        $courses = $admissionsData->pluck('course');
        $counts = $admissionsData->pluck('count');
    
        return response()->json([
            'courses' => $courses,
            'counts' => $counts,
        ]);
    }
    
    public function logoutAdmin(Request $request)
    {

        // Redirect to the admin login page
        return view('bi.admin_login');
    }


    public function logoutBA(Request $request)
    {

        return view('bi.login');
    }

   
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

        // No response is returned
        return view('/contact');
    }
    
    public function showEnquiries()
    {
        // Fetch all enquiries from the database
        $enquiries = Enquiry::all();

        // Return the view with the enquiries data
        return view('enquiries.index', compact('enquiries'));
    }

        public function destroyEnquiry($id)
    {
        // Find the enquiry by ID and delete it
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        // Redirect back with success message
        return redirect()->route('enquiries.index')->with('success', 'Enquiry deleted successfully!');
    }

    public function About()
    {
        return view('About');
    }



    public function service()
    {
        return view('service');
    }

    
    public function contact()
    {
        return view('contact');
    }
    
    public function showadminlogin()
    {
        return view('bi/admin_login');
    }

    public function Enquiry()
    {
        return view('Enquiry');
    }

    public function destroy($id)
    {
        try {
            // Find the project by its ID
            $project = Bawork::findOrFail($id);
    
            // Delete the project
            $project->delete();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            // If there's an error, catch the exception and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while deleting the project: ' . $e->getMessage());
        }
    }
    

}


    
   