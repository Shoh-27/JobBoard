@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Arizalarim</h1>

        @if($applications->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                Hozircha hech qanday ariza yuborilmagan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($applications as $app)
                    <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300">
                        <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $app->job->title }}</h5>
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-full mb-3">{{ $app->job->type }}</span>

                        @if($app->cv_path)
                            <p class="mb-2">
                                <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank"
                                   class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded transition duration-200">
                                    Mening CV
                                </a>
                            </p>
                        @endif

                        <p class="text-gray-500 text-sm">{{ $app->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
