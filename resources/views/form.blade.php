@extends('Layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')

    <div class="bg-white shadow rounded-lg p-6">

        <form method="POST"
              action="{{ isset($task)
                ? route('tasks.update', ['task' => $task->id])
                : route('tasks.store') }}">

            @csrf

            @isset($task)
                @method('PUT')
            @endisset

            <div class="mb-4">
                <label for="title" class="block font-semibold mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $task->title ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                @error('title')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description ?? '') }}</textarea>

                @error('description')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="long_description" class="block font-semibold mb-2">
                    Long Description
                </label>

                <textarea
                    name="long_description"
                    id="long_description"
                    rows="10"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('long_description', $task->long_description ?? '') }}</textarea>

                @error('long_description')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    for="due_date"
                    class="block font-semibold mb-2">

                    Due Date

                </label>

                <input
                    type="datetime-local"
                    name="due_date"
                    id="due_date"
                    value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d\TH:i') : '') }}"
                    class="w-full border border-gray-300 rounded-lg p-2">
                @error('due_date')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                    @isset($task)
                        Update Task
                    @else
                        Add Task
                    @endisset

                </button>

                <a
                    href="{{ isset($task)?route('tasks.show',['task'=>$task]):route('tasks.index') }}"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">

                    Cancel

                </a>

            </div>

        </form>

    </div>

@endsection
