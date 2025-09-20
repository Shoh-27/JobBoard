<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        // Bu employerga tegishli ishlar bo‘yicha arizalar
        $employerId = Auth::id();

        $applications = Application::whereHas('job', function($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })->with('user', 'job')->latest()->get();

        return view('employer.applications.index', compact('applications'));
    }
}
