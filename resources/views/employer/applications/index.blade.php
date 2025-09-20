@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Nomzodlar ro‘yxati</h1>

        @if($applications->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
                Hozircha arizalar mavjud emas.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($applications as $app)
                    <div class="bg-white rounded-xl shadow-lg p-5 hover:shadow-2xl transition duration-300">
                        <h5 class="text-xl font-semibold text-gray-800 mb-2">
                            Ish: {{ $app->job->title }}
                            <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-full ml-2">{{ $app->job->type }}</span>
                        </h5>

                        <p class="text-gray-700 mb-2">
                            Nomzod: <span class="font-medium">{{ $app->user->name }}</span> ({{ $app->user->email }})
                        </p>

                        @if($app->cv_path)
                            <p class="mb-2">
                                CV:
                                <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank"
                                   class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded transition duration-200">
                                    Ko‘rish / Yuklab olish
                                </a>
                            </p>
                        @else
                            <p class="text-red-500 mb-2 font-medium">CV yuklanmagan</p>
                        @endif

                        <p class="text-gray-500 text-sm">Apply qilingan: {{ $app->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
