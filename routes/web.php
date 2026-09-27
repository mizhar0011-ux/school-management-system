<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RegistrationRequestController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Student Dashboard
|--------------------------------------------------------------------------
|
| Only students can access /dashboard.
|
*/

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'role:student'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin');

Route::get('/admin/users', [AdminUserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users');

Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.edit');

Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.update');

Route::patch('/admin/users/{user}/role', [AdminUserController::class, 'updateRole'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.role');

Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.destroy');

/*
|--------------------------------------------------------------------------
| Registration Requests
|--------------------------------------------------------------------------
*/

Route::get('/admin/registration-requests', [RegistrationRequestController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.registration-requests');

Route::patch('/admin/registration-requests/{user}/approve', [RegistrationRequestController::class, 'approve'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.registration-requests.approve');

Route::patch('/admin/registration-requests/{user}/decline', [RegistrationRequestController::class, 'decline'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.registration-requests.decline');

Route::patch('/admin/registration-requests/{user}/pending', [RegistrationRequestController::class, 'pending'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.registration-requests.pending');

Route::delete('/admin/registration-requests/{user}', [RegistrationRequestController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.registration-requests.destroy');

/*
|--------------------------------------------------------------------------
| Activity Logs
|--------------------------------------------------------------------------
*/

Route::get('/admin/activity-logs', [ActivityLogController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.activity-logs');

/*
|--------------------------------------------------------------------------
| Student Management - Admin
|--------------------------------------------------------------------------
*/

Route::get('/students', [StudentController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.create');

Route::post('/students', [StudentController::class, 'store'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.store');

Route::get('/students/{student}', [StudentController::class, 'show'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.show');

Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.edit');

Route::put('/students/{student}', [StudentController::class, 'update'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.update');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('students.destroy');

/*
|--------------------------------------------------------------------------
| Student Profile
|--------------------------------------------------------------------------
*/

Route::get('/student/profile', [StudentProfileController::class, 'edit'])
    ->middleware(['auth', 'role:student'])
    ->name('student.profile');

Route::put('/student/profile', [StudentProfileController::class, 'update'])
    ->middleware(['auth', 'role:student'])
    ->name('student.profile.update');

/*
|--------------------------------------------------------------------------
| Teacher Management - Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('teachers', TeacherController::class);
});

/*
|--------------------------------------------------------------------------
| Teacher Profile
|--------------------------------------------------------------------------
*/

Route::get('/teacher/profile', [TeacherProfileController::class, 'edit'])
    ->middleware(['auth', 'role:teacher'])
    ->name('teacher.profile');

Route::put('/teacher/profile', [TeacherProfileController::class, 'update'])
    ->middleware(['auth', 'role:teacher'])
    ->name('teacher.profile.update');

/*
|--------------------------------------------------------------------------
| Teacher Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/teacher/dashboard', function () {

    $teacher = auth()->user()->teacher;

    if (! $teacher) {
        abort(404, 'Teacher profile not found.');
    }

    return view('teachers.teacher-dashboard', compact('teacher'));

})
    ->middleware(['auth', 'role:teacher'])
    ->name('teacher.dashboard');

/*
|--------------------------------------------------------------------------
| Staff Dashboard
|--------------------------------------------------------------------------
|
| IMPORTANT:
| This route must come BEFORE Route::resource('staff', ...)
| because the resource route creates /staff/{staff}.
|
*/

/*
|--------------------------------------------------------------------------
| Staff Profile
|--------------------------------------------------------------------------
*/

Route::get('/staff/profile', [StaffProfileController::class, 'edit'])
    ->middleware(['auth', 'role:staff'])
    ->name('staff.profile');

Route::put('/staff/profile', [StaffProfileController::class, 'update'])
    ->middleware(['auth', 'role:staff'])
    ->name('staff.profile.update');

Route::get('/staff/dashboard', function () {

    $staff = auth()->user()->staff;

    if (! $staff) {
        abort(404, 'Staff profile not found.');
    }

    return view('staff.staff-dashboard', compact('staff'));

})
    ->middleware(['auth', 'role:staff'])
    ->name('staff.dashboard');

/*
|--------------------------------------------------------------------------
| Staff Management - Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('staff', StaffController::class);
});

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')
        ->name('settings.profile');

    Volt::route('settings/password', 'settings.password')
        ->name('settings.password');

    Volt::route('settings/appearance', 'settings.appearance')
        ->name('settings.appearance');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
