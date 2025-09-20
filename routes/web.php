<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\JobSearchController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController ;
use App\Http\Controllers\Employer\ApplicationController as EmployerApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','role:employer'])
    ->get('/employer/dashboard', [EmployerDashboardController::class,'index'])
    ->name('employer.dashboard');

Route::middleware(['auth','role:user'])
    ->get('/user/dashboard', [UserDashboardController::class,'index'])
    ->name('user.dashboard');


Route::middleware(['auth','role:employer'])->group(function () {
    Route::resource('jobs', JobController::class);
    Route::get('/employer/applications', [EmployerApplicationController::class, 'index'])->name('employer.applications.index');
});


//Route::middleware(['auth','role:user'])->group(function () {
//    Route::get('/jobs', [JobSearchController::class, 'index'])->name('jobs.index');
//});

Route::middleware(['auth','role:user'])->group(function () {
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
    Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
