<?php

use Inertia\Inertia;
use App\Models\ScholarApplication;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for outside pages
Route::get('/scholarship', function () {
    return Inertia::render('Scholarship');
})->name('scholarship');
Route::get('/features', function () {
    return Inertia::render('Features');
})->name('features');
Route::get('/testimonials', function () {
    return Inertia::render('Testimonial');
})->name('testimonials');
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::middleware('auth')->group(function(){
    //Route for User Dashboard
    Route::get('/user_dashboard', function () {
        return Inertia::render('UserDashboard');
    })->name('user_dashboard');

    Route::get('/educational_aid', [ScholarshipController::class, 'userEducationalAid'])->name('educational_aid');

    Route::get('/apply', [ScholarshipController::class, 'applyScholarship'])->name('apply');

    Route::post('/submit-scholarship', [ScholarshipApplicationController::class, 'store'])->name('scholarships.store');

    Route::get('/application_status', [ScholarshipApplicationController::class, 'index'])->name('application_status');
    
    Route::get('/announcement', function () {
        return Inertia::render('Announcement');
    })->name('announcement');
    Route::get('/concern', function () {
        return Inertia::render('Concern');
    })->name('concern');
    Route::get('/profile', function () {
        return Inertia::render('Profile');
    })->name('profile');

});


Route::middleware(['auth', 'admin'])->group(function () {
    // Route for Admin Dashboard
    Route::get('/admin_dashboard', function () {

        $applications = ScholarApplication::all();

        return Inertia::render('AdminDashboard', [
            'auth' => auth()->user(), // Pass the authenticated user
            'applications' => $applications
        ]);
    })->name('admin_dashboard');


    Route::get('/admin_approved', [ScholarshipApplicationController::class, 'approved'])->name('admin_approved');

    Route::get('/admin_pending', [ScholarshipApplicationController::class, 'pending'])->name('admin_pending');

    Route::get('/admin_rejected', [ScholarshipApplicationController::class, 'rejected'])->name('admin_rejected');

    Route::post('/applications/{id}/update-status', [ScholarshipApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

    Route::delete('/applications/{id}', [ScholarshipApplicationController::class, 'destroy'])->name('applications.destroy');

    Route::put('/applications/{id}', [ScholarshipApplicationController::class, 'update']);

    Route::get('/applications/review/{id}', [ScholarshipApplicationController::class, 'view'])->name('applications.view');

    Route::get('/manage_admins', [AdminController::class, 'index'])->name('manage_admins');

    Route::get('/admin_educational_aid', [ScholarshipController::class, 'index'])->name('admin_educational_aid');

    Route::get('/admin_announcement', function () {
        return Inertia::render('AdminAnnouncement', [
            'auth' => auth()->user(), // Pass the authenticated user
        ]);
    })->name('admin_announcement');

    Route::get('/admin_concerns', function () {
        return Inertia::render('AdminConcerns', [
            'auth' => auth()->user(), // Pass the authenticated user
        ]);
    })->name('admin_concerns');

    Route::get('/admin_profile', function () {
        return Inertia::render('AdminProfile', [
            'auth' => auth()->user(), // Pass the authenticated user
        ]);
    })->name('admin_profile');

    Route::get('/admin_logs', function () {
        return Inertia::render('AdminLogs', [
            'auth' => auth()->user(), // Pass the authenticated user
        ]);
    })->name('admin_logs');
});




// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
