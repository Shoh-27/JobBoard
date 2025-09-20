@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nomzodlar ro‘yxati</h1>

        @if($applications->isEmpty())
            <p>Hozircha arizalar mavjud emas.</p>
        @else
            <ul class="list-group">
                @foreach($applications as $app)
                    <li class="list-group-item">
                        <h5>Ish: {{ $app->job->title }} ({{ $app->job->type }})</h5>
                        <p>Nomzod: {{ $app->user->name }} ({{ $app->user->email }})</p>
                        @if($app->cv_path)
                            <p>CV: <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank">Ko‘rish / Yuklab olish</a></p>
                        @else
                            <p>CV yuklanmagan</p>
                        @endif
                        <small>Apply qilingan: {{ $app->created_at->format('d-m-Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

