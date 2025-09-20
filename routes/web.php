<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\UserDashboardController;
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


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
