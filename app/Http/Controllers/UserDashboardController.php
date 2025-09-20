<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Umumiy ishlar soni
        $totalJobs = Job::count();

        // So‘nggi 5 e’lon
        $latestJobs = Job::latest()->take(5)->get();

        return view('user.dashboard', compact('totalJobs', 'latestJobs'));
    }
}
