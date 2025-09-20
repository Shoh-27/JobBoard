@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>E’loni tahrirlash</h1>

        <form action="{{ route('jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Sarlavha</label>
                <input type="text" name="title" value="{{ $job->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description">Tavsif</label>
                <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="type">Turi</label>
                <select name="type" class="form-control">
                    <option value="remote" @if($job->type == 'remote') selected @endif>Remote</option>
                    <option value="on-site" @if($job->type == 'on-site') selected @endif>On-site</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="contact_info">Aloqa</label>
                <input type="text" name="contact_info" value="{{ $job->contact_info }}" class="form-control" required>
            </div>

            <button class="btn btn-primary">Yangilash</button>
        </form>
    </div>
@endsection

