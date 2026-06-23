@extends('Layouts.app')

@section('title')
    The List of Tasks
@endsection

@section('content')

    <div class="mb-6">
        <a
            href="{{ route('tasks.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
        >
            Add Task
        </a>
    </div>

    <div class="space-y-4">

        @forelse($tasks as $task)

            <div class="bg-white shadow rounded-lg p-4">

                <div class="flex justify-between items-center">

                    <a
                        href="{{ route('tasks.show', ['task' => $task]) }}"
                        class="text-lg font-semibold text-blue-600 hover:underline"
                    >
                        {{ $task->title }}
                    </a>

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

                </div>

            </div>

        @empty

            <div class="bg-yellow-100 text-yellow-700 p-4 rounded-lg">
                There are no tasks.
            </div>

        @endforelse

    </div>

    @if($tasks->count())

        <div class="mt-6">
            {{ $tasks->links() }}
        </div>

    @endif

@endsection
