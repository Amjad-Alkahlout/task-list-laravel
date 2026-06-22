@extends('Layouts.app')
@section('title')
    <h1>The list of tasks</h1>
@endsection
@section('content')
    <div>

        @forelse($tasks as $task)
            <div> {{-- calling the route using its name and passing parameter to it--}}
                <a href="{{route('tasks.show', ['task' => $task->id ])}}" >{{$task->title}}</a>
            </div>
        @empty
            <div>there is no task</div>
        @endforelse


    </div>
@endsection
