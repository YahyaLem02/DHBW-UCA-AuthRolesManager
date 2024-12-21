<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FablabController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\PasswordResetController;

use App\Http\Controllers\LogController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Authentication Routes

// Login Routes
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Route (restricted to students)
Route::post('/register', [AuthController::class, 'register'])->middleware('student.signup');

// Email Verification Routes
// Email Verification Notice
Route::get('/email/verify', function () {
    return view('front.login.verify-email');
})->middleware('auth')->name('verification.notice');

// Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Mark the user as verified
    return redirect('/'); // Redirect to the dashboard after successful verification
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Verification Email
Route::post('/email/resend', function (Request $request) {
    $user = $request->user(); // Get the authenticated user
    $user->sendEmailVerificationNotification(); // Resend the verification email
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::post('/signup', [AuthController::class, 'register'])->middleware('student.signup');



// Home Controller : Navigate in the Front Office 

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/exchange_students',[HomeController::class, 'exchange_students']);
Route::get('/students_profiles',[HomeController::class, 'students_profiles']);
Route::get('/faculty_staff_exchange',[HomeController::class, 'faculty_staff_exchange']);

Route::get('/home-internships',[HomeController::class, 'internships']);

Route::get('/workshop',[HomeController::class, 'workshop']);
Route::get('/research_projects',[HomeController::class, 'research_projects']);
Route::get('/program',[HomeController::class, 'program']);
Route::get('/academic_programs',[HomeController::class, 'academic_programs']);
Route::get('/cultural_programs',[HomeController::class, 'cultural_programs']);
Route::get('/achievements',[HomeController::class, 'achievements']);
Route::get('/partners',[HomeController::class, 'partners']);
Route::get('/about',[HomeController::class, 'about']);
// Route::get('/news',[HomeController::class, 'news']);

//Internships Controller : Front Office

Route::get('/home-internships', [InternshipController::class, 'filterInternships'])->name('home-internships');



//Students Controller : Front Office
Route::get('/students_profiles', [StudentController::class, 'filterStudents'])->name('students_profiles');

//Teachers Controller : Front Office
Route::get('/faculty_staff_exchange', [TeacherController::class, 'filterTeachers'])->name('faculty_staff_exchange');

//Workshops Controller : Front Office
Route::get('/workshop', [WorkshopController::class, 'filterWorkshop'])->name('workshops');

//News Controller : Front Office
Route::get('/news', [NewsController::class, 'displayNews'])->name('front.news.news');
Route::get('/', [NewsController::class, 'index'])->name('front.index');
Route::get('/news/{slug}', [NewsController::class, 'showNews'])->name('front.news.showNews');

//Partners Controller : Front Office
Route::get('/partners', [PartnerController::class, 'showPartners'])->name('front.partners.partners');

//Achievements Controller : Front Office
Route::get('/achievements', [FablabController::class, 'showFablabs'])->name('front.achievements.achievements');
Route::get('/achievements/{fablabs:slug}', [FablabController::class, 'displayFablab'])->name('front.achievements.showFablab');

//Programs Controller : Front Office
Route::get('/academic_programs', [ProgramController::class, 'filterAcademicPrograms'])->name('academic_programs');
Route::get('/cultural_programs', [ProgramController::class, 'filterCulturalPrograms'])->name('cultural_programs');

//Projects Controller : Front Office
Route::get('/research_projects', [ProjectController::class, 'showProjects'])->name('front.research_projects.research_projects');
Route::get('/research_projects/{projects:slug}', [ProjectController::class, 'displayProject'])->name('front.research_projects.showProjects');


//Login Controller : Front Office
// Route::get('/login', [LogController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LogController::class, 'login']);

//Search Controller : Front Office
Route::get('/search', [SearchController::class, 'search'])->name('search');







// Route::get('/login',[HomeController::class, 'login'])->name('login');
// Route::post('admin.login', [UserController::class, 'authenticate'])->name('admin.login');

/*
* Admin routes
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // Route::post('logout', [UserController::class, 'logout'])->name('admin.logout');
    // Admin Controller : Navigate in the back Controller 
    // Route::get('/admin', [UserController::class, 'index'])->name('admin');
    // Route::get('/exchanges', [UserController::class, 'exchanges'])->name('exchanges');
    // Route::get('/workshops', [UserController::class, 'workshops'])->name('workshops');
    // Route::get('/projects', [UserController::class, 'projects'])->name('projects');
    // Route::get('/fablabs', [UserController::class, 'fablabs'])->name('fablabs');
    // Route::get('/programs', [UserController::class, 'programs'])->name('programs');


    // Teacher Part 
    Route::get('/teachers', [UserController::class, 'teachers'])->name('teachers');
    Route::delete('/teacher-deleteRoute/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::post('teachers.add', [TeacherController::class, 'store'])->name('teachers.add');
    Route::put('/teachers/update/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    // Student Part 

    Route::get('/students', [UserController::class, 'students'])->name('students');
    Route::delete('/student-deleteRoute/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('students.add', [StudentController::class, 'store'])->name('students.add');
    Route::put('/students/update/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/{id}', [StudentController::class, 'showProfile'])->name('student.profile');
    Route::get('/affectInternship', [StudentController::class, 'affectInternship'])->name('affectInternship');


    // Exchanges  
    Route::get('/exchanges', [UserController::class, 'exchanges'])->name('exchanges');
    Route::delete('/exchange-deleteRoute/{exchange}', [Exchangecontroller::class, 'destroy'])->name('exchanges.destroy');
    Route::post('exchanges.add', [Exchangecontroller::class, 'store'])->name('exchanges.add');
    Route::put('/exchanges/update/{exchange}', [ExchangeController::class, 'update'])->name('exchanges.update');
    // workshops  
    Route::get('/workshops', [UserController::class, 'workshops'])->name('workshops');
    Route::delete('/workshops-deleteRoute/{workshop}', [Workshopcontroller::class, 'destroy'])->name('workshops.destroy');
    Route::post('workshops.add', [Workshopcontroller::class, 'store'])->name('workshops.add');
    Route::put('/workshops/update/{workshop}', [Workshopcontroller::class, 'update'])->name('workshops.update');
    // Partners 
    Route::get('/partner', [UserController::class, 'partners'])->name('partners');
    Route::delete('/partners-deleteRoute/{partner}', [Partnercontroller::class, 'destroy'])->name('partners.destroy');
    Route::post('partners.add', [Partnercontroller::class, 'store'])->name('partners.add');
    Route::put('/partners/update/{partner}', [Partnercontroller::class, 'update'])->name('partners.update');
    // Internships 
    Route::get('/internships', [UserController::class, 'internships'])->name('internships');
    Route::delete('/internships-deleteRoute/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
    Route::post('internships.add', [InternshipController::class, 'store'])->name('internships.add');
    Route::put('/internships/update/{internship}', [InternshipController::class, 'update'])->name('internships.update');
    Route::get('/internship_show/{internship}', [InternshipController::class, 'internship_show'])->name('internship_show');
    Route::put('/internships/affectStudents/{internship}', [InternshipController::class, 'affectStudents'])->name('internships.affectStudents');
    Route::delete('/internships/removeStudent/{internship}/{student}', [InternshipController::class, 'removeStudent'])->name('internships.removeStudent');
    Route::put('/internships/affectSupervisors/{internship}', [InternshipController::class, 'affectSupervisors'])->name('internships.affectSupervisors');
    Route::delete('/internships/removeSupervisor/{internship}/{supervisor}', [InternshipController::class, 'removeSupervisor'])->name('internships.removeSupervisor');


    // Projects 
    Route::get('/projects', [UserController::class, 'projects'])->name('projects');
    Route::delete('/projects-deleteRoute/{project}', [Projectcontroller::class, 'destroy'])->name('projects.destroy');
    Route::post('projects.add', [Projectcontroller::class, 'store'])->name('projects.add');
    Route::put('/projects/update/{project}', [Projectcontroller::class, 'update'])->name('projects.update');
    // fablabs 
    Route::get('/fablabs', [UserController::class, 'fablabs'])->name('fablabs');
    Route::delete('/fablabs-deleteRoute/{fablab}', [FablabController::class, 'destroy'])->name('fablabs.destroy');
    Route::post('fablabs.add', [FablabController::class, 'store'])->name('fablabs.add');
    Route::put('/fablabs/update/{fablab}', [FablabController::class, 'update'])->name('fablabs.update');
    // programs 
    Route::get('/programs', [UserController::class, 'programs'])->name('programs');
    Route::delete('/programs-deleteRoute/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    Route::post('programs.add', [ProgramController::class, 'store'])->name('programs.add');
    Route::put('/programs/update/{program}', [ProgramController::class, 'update'])->name('programs.update');
    // programs 
    // Route::get('/news', [UserController::class, 'news'])->name('news');
    // Route::delete('/programs-deleteRoute/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    // Route::post('programs.add', [ProgramController::class, 'store'])->name('programs.add');
    // Route::put('/programs/update/{program}', [ProgramController::class, 'update'])->name('programs.update');

});


/*
* Teacher routes
*/
Route::middleware(['auth', 'role:teacher'])->group(function () {
});

/*
* Student routes
*/
Route::middleware(['auth', 'role:student'])->group(function () {
});

/*
* All users routes
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/my-profile',
        function () {
            if(Auth::getUser()->isAdmin()) return view('back.my_profile');
            else return view('front.my_profile');
        }
    )->name('admin.my_profile');
});


// Forgot Password
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');