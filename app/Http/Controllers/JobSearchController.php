<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();

        // qidiruv (title bo‘yicha)
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // filter turi bo‘yicha
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $jobs = $query->latest()->paginate(10);

        return view('jobs.user_index', compact('jobs'));
    }
}

