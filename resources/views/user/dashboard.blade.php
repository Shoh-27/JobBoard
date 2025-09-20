@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">User Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Umumiy ishlar soni -->
            <div class="bg-white rounded-xl shadow-lg p-5 text-center hover:shadow-2xl transition duration-300">
                <h3 class="text-3xl font-bold text-gray-800">{{ $totalJobs }}</h3>
                <p class="text-gray-600 mt-2">Umumiy ishlar</p>
            </div>
        </div>

        <!-- So‘nggi e’lonlar -->
        <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300 mb-6">
            <h4 class="text-xl font-semibold text-gray-800 mb-4">So‘nggi e’lonlar</h4>

            @if($latestJobs->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                    Hozircha e’lonlar mavjud emas.
                </div>
            @else
                <div class="space-y-4">
                    @foreach($latestJobs as $job)
                        <div class="bg-gray-50 border border-gray-200 rounded p-4 hover:bg-gray-100 transition duration-200">
                            <h5 class="text-lg font-semibold text-gray-800">{{ $job->title }}
                                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded ml-2">{{ $job->type }}</span>
                            </h5>
                            <p class="text-gray-700 mt-1">{{ Str::limit($job->description, 100) }}</p>
                            <p class="text-gray-500 text-sm mt-1"><strong>Aloqa:</strong> {{ $job->contact_info }}</p>
                            <a href="mailto:{{ $job->contact_info }}"
                               class="inline-block bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mt-2 transition duration-200">
                                Apply
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Link ishlarni ko‘rish / filtrlash -->
        <div class="flex space-x-3 mt-4">
            <a href="{{ route('jobs.index') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Ishlarni ko‘rish & Filtrlash
            </a>
            <a href="{{ route('applications.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
                Mening arizalarim
            </a>
        </div>
    </div>
@endsection
