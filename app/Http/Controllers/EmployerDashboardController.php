<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        // faqat shu employerning e’lonlari chiqadi
        $jobs = Job::where('employer_id', auth()->id())->latest()->get();

        // umumiy statistika
        $totalJobs = $jobs->count();
        $latestJob = $jobs->first();

        return view('employer.dashboard', compact('jobs', 'totalJobs', 'latestJob'));
    }
}
