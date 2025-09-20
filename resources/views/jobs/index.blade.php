@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Mening ish e’lonlarim</h1>
            <a href="{{ route('jobs.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Yangi e’lon qo‘shish
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($jobs->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                Hozircha hech qanday e’lon qo‘shilmagan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300">
                        <h5 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $job->title }}
                            <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-full ml-2">{{ $job->type }}</span>
                        </h5>
                        <p class="text-gray-700 mb-2">{{ $job->description }}</p>
                        <p class="text-gray-500 text-sm mb-3">Contact: {{ $job->contact_info }}</p>

                        <div class="flex space-x-2">
                            <a href="{{ route('jobs.edit', $job) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition duration-200">
                                Tahrirlash
                            </a>
                            <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200">
                                    O‘chirish
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
