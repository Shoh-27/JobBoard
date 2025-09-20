@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employer Dashboard</h1>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3>{{ $totalJobs }}</h3>
                        <p>Umumiy e’lonlar soni</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Mening e’lonlarim
                        <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-primary float-end">Yangi e’lon qo‘shish</a>
                    </div>
                    <div class="card-body">
                        @if($jobs->isEmpty())
                            <p>Hozircha hech qanday e’lon qo‘shilmagan.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sarlavha</th>
                                    <th>Turi</th>
                                    <th>Yaratilgan vaqti</th>
                                    <th>Amallar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->type }}</td>
                                        <td>{{ $job->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning">✏️</a>
                                            <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($latestJob)
            <div class="card mt-4">
                <div class="card-header">So‘nggi e’lon</div>
                <div class="card-body">
                    <h5>{{ $latestJob->title }}</h5>
                    <p>{{ Str::limit($latestJob->description, 100) }}</p>
                </div>
            </div>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('employer.applications.index') }}" class="btn btn-primary">
            Apply qilgan nomzodlarni ko‘rish
        </a>
    </div>
@endsection


