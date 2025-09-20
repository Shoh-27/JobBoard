@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mening ish e’lonlarim</h1>

        <a href="{{ route('jobs.create') }}" class="btn btn-primary">Yangi e’lon qo‘shish</a>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <ul class="list-group mt-3">
            @foreach($jobs as $job)
                <li class="list-group-item">
                    <h5>{{ $job->title }} ({{ $job->type }})</h5>
                    <p>{{ $job->description }}</p>
                    <small>Contact: {{ $job->contact_info }}</small>
                    <div class="mt-2">
                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">O‘chirish</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
