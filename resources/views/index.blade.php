@extends('Layouts.app')
@section('title')
    <h1>The list of tasks</h1>
@endsection
@section('content')

    <div>
        <a href="{{route('tasks.create')}}">Add Task</a>
    </div>
    <div>

        @forelse($tasks as $task)
            <div> {{-- calling the route using its name and passing parameter to it--}}
                <a href="{{route('tasks.show', ['task' => $task ])}}" >{{$task->title}}</a>
            </div>
        @empty
            <div>there is no task</div>
        @endforelse


    </div>
        @if ($tasks->count())
            <nav>
                {{ $tasks->links() }}
            </nav>
        @endif

@endsection
