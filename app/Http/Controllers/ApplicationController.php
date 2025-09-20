<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $job->id,
            'cv_path' => $cvPath,
        ]);

        return back()->with('success', 'Ariza muvaffaqiyatli yuborildi!');
    }

    public function index()
    {
        $applications = Application::where('user_id', Auth::id())->with('job')->latest()->get();
        return view('applications.index', compact('applications'));
    }
}

