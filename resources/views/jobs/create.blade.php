@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Yangi e’lon qo‘shish</h1>

        <form action="{{ route('jobs.store') }}" method="POST" class="bg-white rounded-xl shadow-lg p-6 space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-medium mb-1">Sarlavha</label>
                <input type="text" name="title" required
                       class="w-full border border-gray-300 rounded text-gray-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Tavsif</label>
                <textarea name="description" required
                          class="w-full border border-gray-300 rounded text-gray-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
            </div>

            <div>
                <label for="type" class="block text-gray-700 font-medium mb-1">Turi</label>
                <select name="type"
                        class="w-full border border-gray-300 text-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="remote">Remote</option>
                    <option value="on-site">On-site</option>
                </select>
            </div>

            <div>
                <label for="contact_info" class="block text-gray-700 font-medium mb-1">Aloqa</label>
                <input type="text" name="contact_info" required
                       class="w-full border border-gray-300 rounded text-gray-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">
                Saqlash
            </button>
        </form>
    </div>
@endsection
