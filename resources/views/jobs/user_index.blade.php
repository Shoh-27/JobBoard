@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ish e’lonlari</h1>

        <!-- Qidiruv va Filter -->
        <form action="{{ route('jobs.index') }}" method="GET" class="mb-4 flex space-x-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Ish nomi" class="border rounded px-2 py-1">
            <select name="type" class="border rounded px-2 py-1">
                <option value="">Hammasi</option>
                <option value="remote" @if(request('type')=='remote') selected @endif>Remote</option>
                <option value="on-site" @if(request('type')=='on-site') selected @endif>On-site</option>
            </select>
            <button class="btn btn-primary px-3 py-1">Filtrlash</button>
        </form>

        @if($jobs->isEmpty())
            <p>Hozircha e’lonlar mavjud emas.</p>
        @else
            <ul class="list-group">
                @foreach($jobs as $job)
                    <li class="list-group-item">
                        <h5>{{ $job->title }} ({{ $job->type }})</h5>
                        <p>{{ Str::limit($job->description, 100) }}</p>
                        <p><strong>Aloqa:</strong> {{ $job->contact_info }}</p>
                        <form action="mailto:{{ $job->contact_info }}" method="get">
                            <button class="btn btn-sm btn-success mt-1">Apply</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <div class="mt-4">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>
@endsection

