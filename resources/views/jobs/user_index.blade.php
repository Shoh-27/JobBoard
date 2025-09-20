@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Ish e’lonlari</h1>

        <!-- Qidiruv va Filter -->
        <form action="{{ route('jobs.index') }}" method="GET" class="mb-6 flex flex-col md:flex-row md:space-x-3 space-y-2 md:space-y-0">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Ish nomi"
                   class="border border-gray-300 rounded px-3 py-2 w-full md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select name="type" class="border border-gray-800 text-gray-600 rounded px-3 py-2 w-full md:w-1/4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Hammasi</option>
                <option value="remote" @if(request('type')=='remote') selected @endif>Remote</option>
                <option value="on-site" @if(request('type')=='on-site') selected @endif>On-site</option>
            </select>
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Filtrlash
            </button>
        </form>

        @if($jobs->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                Hozircha e’lonlar mavjud emas.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300">
                        <h5 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $job->title }}
                            <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-full ml-2">{{ $job->type }}</span>
                        </h5>
                        <p class="text-gray-700 mb-2">{{ Str::limit($job->description, 100) }}</p>
                        <p class="text-gray-500 text-sm mb-3"><strong>Aloqa:</strong> {{ $job->contact_info }}</p>

                        <!-- Apply form -->
                        <form action="{{ route('jobs.apply', $job) }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-2">
                            @csrf
                            <input type="file" name="cv" accept=".pdf,.doc,.docx"
                                   class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-green-400">
                            <button type="submit"
                                    class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600 transition duration-200">
                                Apply
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>
@endsection
