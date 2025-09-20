@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Arizalarim</h1>

        @if($applications->isEmpty())
            <p>Hozircha hech qanday ariza yuborilmagan.</p>
        @else
            <ul class="list-group">
                @foreach($applications as $app)
                    <li class="list-group-item">
                        <h5>{{ $app->job->title }} ({{ $app->job->type }})</h5>
                        @if($app->cv_path)
                            <p><a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank">Mening CV</a></p>
                        @endif
                        <p><small>{{ $app->created_at->format('d-m-Y H:i') }}</small></p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

