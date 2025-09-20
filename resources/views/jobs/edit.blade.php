@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">E’loni tahrirlash</h1>

        <form action="{{ route('jobs.update', $job) }}" method="POST" class="bg-white rounded-xl shadow-lg p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-gray-700 font-medium mb-1">Sarlavha</label>
                <input type="text" name="title" value="{{ $job->title }}" required
                       class="w-full border border-gray-300 text-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Tavsif</label>
                <textarea name="description" required
                          class="w-full border border-gray-300 text-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $job->description }}</textarea>
            </div>

            <div>
                <label for="type" class="block text-gray-700 font-medium mb-1">Turi</label>
                <select name="type" class="w-full border border-gray-300 text-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="remote" @if($job->type == 'remote') selected @endif>Remote</option>
                    <option value="on-site" @if($job->type == 'on-site') selected @endif>On-site</option>
                </select>
            </div>

            <div>
                <label for="contact_info" class="block text-gray-700 font-medium mb-1">Aloqa</label>
                <input type="text" name="contact_info" value="{{ $job->contact_info }}" required
                       class="w-full border border-gray-300 text-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Yangilash
            </button>
        </form>
    </div>
@endsection
