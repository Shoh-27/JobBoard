@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yangi e’lon qo‘shish</h1>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Sarlavha</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description">Tavsif</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="type">Turi</label>
                <select name="type" class="form-control">
                    <option value="remote">Remote</option>
                    <option value="on-site">On-site</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="contact_info">Aloqa</label>
                <input type="text" name="contact_info" class="form-control" required>
            </div>

            <button class="btn btn-success">Saqlash</button>
        </form>
    </div>
@endsection

