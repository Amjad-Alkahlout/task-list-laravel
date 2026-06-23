@extends('Layouts.app')

@section('title')
@endsection

@section('content')
    <nav class="text-sm text-gray-500 mb-6">
        <a
            href="{{ route('tasks.index') }}"
            class="hover:text-blue-600">
            Tasks
        </a>

        <span class="mx-1">/</span>

        <span>{{ $task->title }}</span>
    </nav>

    <div class="bg-white rounded-xl shadow-md p-6">


        <h2 class="text-2xl font-bold mb-4">
            {{ $task->title }}
        </h2>

        <div class="flex items-center gap-3 mb-4">

            @if($task->is_completed)
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Completed
        </span>

            @elseif($task->due_date && $task->due_date->isPast())
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
            Overdue
        </span>

            @else
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
            Pending
        </span>
            @endif

                @if($task->due_date)

                    @if($task->due_date->isPast() && !$task->is_completed)

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
            📅 {{ $task->due_date->format('d M Y') }}
        </span>

                    @else

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
            📅 {{ $task->due_date->format('d M Y') }}
        </span>

                    @endif

                @endif

        </div>

        <div class="space-y-4">

            <div>
                <h3 class="font-semibold text-gray-700">Description</h3>
                <p>{{ $task->description }}</p>
            </div>

            @if($task->long_description)
                <div>
                    <h3 class="font-semibold text-gray-700">Long Description</h3>
                    <p>{{ $task->long_description }}</p>
                </div>
            @endif

            <div class="flex gap-6 text-sm text-gray-500">
                <span>Created: {{ $task->created_at->diffForHumans() }}</span>
                <span>Updated: {{ $task->updated_at->diffForHumans() }}</span>
            </div>

        </div>

        <div class="flex gap-3 mt-6">

            <form method="POST"
                  action="{{ route('tasks.taskToggle', ['task' => $task]) }}">
                @csrf
                @method('PUT')

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition hover:scale-105">
                    Mark as {{ $task->is_completed ? 'Not Completed' : 'Completed' }}
                </button>
            </form>

            <a
                href="{{ route('tasks.edit', ['task' => $task]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition hover:scale-105">
                Edit
            </a>

            <form
                action="{{ route('tasks.delete', ['task' => $task]) }}"
                method="POST">
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    onclick="return confirm('Are you sure you want to delete this task?')"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition hover:scale-105">
                    Delete
                </button>
            </form>

        </div>

    </div>

@endsection
