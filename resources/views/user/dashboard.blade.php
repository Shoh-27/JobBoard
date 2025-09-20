@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Dashboard</h1>

        <div class="row mt-4">
            <!-- Umumiy ishlar soni -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h3>{{ $totalJobs }}</h3>
                        <p>Umumiy ishlar</p>
                    </div>
                </div>
            </div>

            <!-- So‘nggi e’lonlar -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">So‘nggi e’lonlar</div>
                    <div class="card-body">
                        @if($latestJobs->isEmpty())
                            <p>Hozircha e’lonlar mavjud emas.</p>
                        @else
                            <ul class="list-group">
                                @foreach($latestJobs as $job)
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
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Link ishlarni qidirish / filter qilish -->
        <div class="mt-4">
            <a href="{{ route('jobs.index') }}" class="btn btn-primary">Ishlarni ko‘rish & Filtrlash</a>
        </div>
    </div>
@endsection

