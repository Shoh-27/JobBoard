@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Employer Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-lg p-5 text-center hover:shadow-2xl transition duration-300">
                <h3 class="text-3xl font-bold text-gray-800">{{ $totalJobs }}</h3>
                <p class="text-gray-600 mt-2">Umumiy e’lonlar soni</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-xl font-semibold text-gray-800">Mening e’lonlarim</h4>
                <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                    Yangi e’lon qo‘shish
                </a>
            </div>

            @if($jobs->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                    Hozircha hech qanday e’lon qo‘shilmagan.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600 font-medium">Sarlavha</th>
                            <th class="px-4 py-2 text-left text-gray-600 font-medium">Turi</th>
                            <th class="px-4 py-2 text-left text-gray-600 font-medium">Yaratilgan vaqti</th>
                            <th class="px-4 py-2 text-left text-gray-600 font-medium">Amallar</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($jobs as $job)
                            <tr class="hover:bg-gray-50 text-gray-600">
                                <td class="px-4 py-2">{{ $job->title }}</td>
                                <td class="px-4 py-2">{{ $job->type }}</td>
                                <td class="px-4 py-2">{{ $job->created_at->format('d-m-Y H:i') }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('jobs.edit', $job) }}"
                                       class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 transition duration-200">
                                        ✏️
                                    </a>
                                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-200">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        @if($latestJob)
            <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300 mb-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">So‘nggi e’lon</h4>
                <h5 class="text-xl font-bold text-gray-700">{{ $latestJob->title }}</h5>
                <p class="text-gray-600 mt-1">{{ Str::limit($latestJob->description, 100) }}</p>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('employer.applications.index') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Apply qilgan nomzodlarni ko‘rish
            </a>
        </div>
    </div>
@endsection
