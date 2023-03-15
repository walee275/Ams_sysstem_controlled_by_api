<?php

use App\Http\Controllers\AdminCompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\StudentController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\AdminDynamicController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLeaveRequestController;
use App\Http\Controllers\AdminStudentDashboardController;
use App\Http\Controllers\AdminStudentAttendenceController;
use App\Http\Controllers\ApiRequestHandleController;
use App\Http\Controllers\student\StudentProfileController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\student\StudentAttendanceController;
use App\Http\Controllers\student\StudentLeaveRequestController;
use App\Http\Controllers\auth\StudentRegisterationController;
use Illuminate\Support\Facades\Http;

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



Route::controller(LoginController::class)->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/', 'view')->name('home');
    // Route::get('/', 'view')->name('home');
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');





Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::controller(AdminStudentAttendenceController::class)->group(function () {
        Route::get('students/attendance', 'index')->name('students.attendance');
        Route::get('students/attendances', 'single_attendance_index')->name('single.student.attendances');

        Route::get('student/attendance/create', 'create')->name('students.attendance.create');
        Route::post('student/attendance/create', 'store');

        Route::get('students/student/attendance/{attendance}/edit', 'edit')->name('student.attendance.edit');
        Route::post('students/student/attendance/{attendance}/edit', 'update');

        Route::get('student/attendance/{attendance}/destroy', 'destroy')->name('students.attendance.destroy');
    });
    Route::controller(AdminStudentController::class)->group(function () {
        Route::get('students', 'index')->name('students');
        Route::get('student/add', 'create')->name('student.create');
        Route::post('student/add', 'store');
        Route::get('student/{student}/profile', 'show')->name('student.profile');
        Route::get('edit/{student}/student', 'edit')->name('student.edit');
        Route::post('edit/{student}/student', 'update');
    });

    Route::controller(AdminLeaveRequestController::class)->group(function () {
        Route::get('students/leave/requests', 'index')->name('students.leave.requests');
        Route::post('students/leave/requests', 'get');
        // Route::Post('students//leave/requests/add', 'store')->name('students.leave.requests');
        Route::get('students/leave/requests/{leave_request}/approve', 'approve_leave_request')->name('student.approve.leave.request');
        Route::get('students/leave/requests/{leave_request}/reject', 'reject_leave_request')->name('student.reject.leave.request');
        Route::get('students/leaverequests', 'destroy')->name('students.leave.request.destroy');
    });

    Route::controller(AdminCompanyController::class)->group(function () {
        Route::get('companies', 'index')->name('companies');
        Route::get('company/add', 'create')->name('company.create');
        Route::post('company/add', 'store');
        Route::get('company/{company}/profile', 'show')->name('company.profile');
        Route::get('edit/{company}/company', 'edit')->name('company.edit');
        Route::post('edit/{company}/company', 'update');
        Route::get('company/{company}/destroy', 'destroy')->name('company.destroy');
    });



    Route::controller(AdminDynamicController::class)->group(function () {
        Route::post('fetch/attendance', 'fetch_attendances')->name('fetch.attendances');
        Route::post('fetch/student/attendances', 'fetch_single_student_attendances')->name('fetch.single.student.attendances');

    });
});



Route::controller(ApiRequestHandleController::class)->group(function () {
    Route::get('/fetch/company/users/{company}', 'fetch_company_users')->name('fetch_company_users');
    Route::get('/fetch/companies', 'fetch_companies')->name('fetch_companies');
    Route::post('/fetch/attendances', 'fetch_attendances')->name('fetch_attendances');
    Route::post('/create/students/attendance', 'create_attendance')->name('create_attendances');

    Route::post('/update/student/{attendance}/attendance', 'update_attendance')->name('update_attendances');
    Route::get('admin/students/destroy/attendance/{attendance}', 'destroy_attendance')->name('attendance.destroy');


    // Route::get('/fetch/students', 'fetch_students')->name('fetch_students');

    Route::post('/fetch/student/attendances', 'fetch_single_student_attendances')->name('fetch_single_student_attendances');
    Route::post('fetch/leave/requests', 'fetch_leave_requests')->name('fetch.leave.requests');
    Route::post('fetch/leave/requests/{status}', 'fetch_specific_leave_requests')->name('fetch.specific.leave.requests');

});


Route::get('/main', function () {
    $company = 1;
    $data = [
        'company' => $company
    ];
    return view('layouts.main', $data);
})->name('main');
