<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $jobs = Job::where('employer_id', auth()->id())->latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:remote,on-site',
            'contact_info' => 'required|string|max:255',
        ]);

        Job::create([
            'employer_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'contact_info' => $request->contact_info,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Ish e’loningiz yaratildi.');
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job); // policy qo‘shsak yaxshi bo‘ladi
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:remote,on-site',
            'contact_info' => 'required|string|max:255',
        ]);

        $job->update($request->only('title', 'description', 'type', 'contact_info'));

        return redirect()->route('jobs.index')->with('success', 'E’lon yangilandi.');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'E’lon o‘chirildi.');
    }
}
