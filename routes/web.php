<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_auth;
use App\Http\Controllers\EmailController;



Route::get('/bi/login', function () {
    return view('bi/login');
});

// Default home route
Route::get('/bi/user_regis', function () {
    return view('bi/user_regis');
});

Route::get('/bi/login', function () {
    return view('bi.login');
})->name('bi.login');

// Registration routes
Route::view('/registration', 'registration')->name('register.form');
Route::post('/registration', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Note: Only one route should handle the POST request for /register
Route::post('/register', [AuthController::class, 'registerSubmit']);

// Confirmed registrations route
Route::get('/confirmed', [RegistrationController::class, 'confirmedIndex'])->name('confirmed.index');

// Registration resource routes
Route::resource('registrations', RegistrationController::class);

// Additional routes for specific functionalities
Route::get('/list', [ListController::class, 'index'])->name('list');
Route::get('/registrations/courseC', [RegistrationController::class, 'registrationsWithCourseC'])->name('registrations.courseC');

// Specific edit and update routes
Route::get('/registrations/{id}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
Route::put('/registrations/{id}', [RegistrationController::class, 'saveUpdates'])->name('registrations.saveUpdates');

// Specific destroy route to avoid conflict with resource routes
Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
Route::delete('/registrations/{id}/destroy1', [RegistrationController::class, 'destroy1'])->name('registrations.destroy1');

// Admission routes
Route::get('/admissions/{id}/edit', [AdmissionController::class, 'showEditForm'])->name('admissions.edit');
Route::put('/admissions/{id}', [AdmissionController::class, 'saveUpdates'])->name('admissions.update');

// Specific routes for confirmed registrations
Route::get('/registrations/confirmed', [RegistrationController::class, 'showConfirmedRegistrations'])->name('registrations.confirmed');
Route::get('/registrations/edit_confirm/{id}', [RegistrationController::class, 'editConfirm'])->name('registrations.edit_confirm');
Route::put('/registrations/save_updates/{id}', [RegistrationController::class, 'saveUpdates'])->name('registrations.saveUpdates');

// Course-specific routes
Route::get('/admissions/courses', [AdmissionsController::class, 'showCCourses'])->name('admissions.courses');

Route::get('/admissions/courses-c',[RegistrationController::class,'showcourses'])->name('registrations.clist');  
Route::get('/admissions/courses-c++',[RegistrationController::class,'showcourses1'])->name('registrations.c++list'); 
Route::get('/admissions/courses-php',[RegistrationController::class,'showcourses2'])->name('registrations.phplist'); 
Route::get('/admissions/courses-Java',[RegistrationController::class,'showcourses3'])->name('registrations.Javalist'); 
Route::get('/admissions/courses-Aws',[RegistrationController::class,'showcourses4'])->name('registrations.Awslist'); 
Route::get('/admissions/courses-Angular',[RegistrationController::class,'showcourses5'])->name('registrations.Angularlist'); 
Route::get('/admissions/courses-Spring-boot',[RegistrationController::class,'showcourses6'])->name('registrations.Spring-boot'); 
// one pending for the spring boot 

// for bi 
Route::post('/bi/user_regis', [user_auth::class, 'store'])->name('user_regis.stores');
Route::post('/login', [user_auth::class, 'login'])->name('login');

Route::post('/bi/login', [user_auth::class, 'showLoginForm'])->name('bi_login.shows');

Route::get('/bi/BAwork', function () {  return view('bi/BAwork');});

Route::post('/bi/BAwork', [user_auth::class, 'bastore'])->name('bawork.stores');
//Route::get('/bi/projects', [user_auth::class, 'showProjects'])->name('bi.product_report');


// all the projects 
Route::get('/bi/projects', [user_auth::class, 'showProjects'])->name('bi.projects');

//courses wise sepration 
Route::get('/projects', [user_auth::class, 'showProjects'])->name('projects.show');
Route::get('/projects/{id}/edit', [user_auth::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [user_auth::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [user_auth::class, 'destroy'])->name('projects.destroy');


//ongoing projects 
Route::get('/bi/ongoing-projects', [user_auth::class, 'indexs'])->name('ongoing.projects');
Route::get('/bi/pending-projects', [user_auth::class, 'indexs2'])->name('pending.projects');
Route::get('/bi/upcoming-projects', [user_auth::class, 'indexs3'])->name('upcoming.projects');
Route::get('/bi/completed-projects', [user_auth::class, 'indexs4'])->name('completed.projects');


Route::post('/admin/login', [user_auth::class, 'loginAdmin'])->name('admin.login');

Route::get('/adminlogin', [user_auth::class, 'showadminlogin'])->name('admin.login1');

Route::get('/admin', function () {
    return view('bi.admin_login');
});

Route::get('/admin/register', [user_auth::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [user_auth::class, 'register'])->name('admin.register');


Route::post('/admin/register', [user_auth::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [user_auth::class, 'register'])->name('admin.register');
//Route::get('/admin/login', function () { return view('admin.login'); })->name('admin.login');



Route::get('/dashboard', [user_auth::class, 'showDashboard'])->name('dashboard.show');;
Route::get('/dashboard-data', [user_auth::class, 'getDashboardData']);

Route::post('/admin', [user_auth::class, 'logoutAdmin'])->name('admin.logout');
Route::post('/bi/login', [user_auth::class, 'logoutBA'])->name('bi.logout');


Route::get('/bi/enq', function () {
    return view('registrations/enq');
});



Route::post('/submit-enquiry', [user_auth::class, 'store3'])->name('enquiry.store');
Route::get('/enquiries', [user_auth::class, 'showEnquiries'])->name('enquiries.index');
Route::delete('/enquiries/{id}', [user_auth::class, 'destroyEnquiry'])->name('enquiries.destroy');

Route::get('/', function () { return view('index');})->name('cc.index');;
Route::get('/About', [user_auth::class, 'About'])->name('cc.About');
Route::get('/service', [user_auth::class, 'service'])->name('cc.service');
Route::get('/contact', [user_auth::class, 'contact'])->name('cc.contact');
Route::get('/Enquiry', [user_auth::class, 'Enquiry'])->name('cc.Enquiry');



Route::post('send-contact-email', [EmailController::class, 'sendContactEmail'])->name('send.contact.email');

