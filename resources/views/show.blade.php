@extends('Layouts.app')
@section('title',$task->title)
@section('content')
<p>{{$task->description}}</p>
@if ($task->long_description)
    <p>{{$task->long_description}}</p>
@endif
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

    <div>
        {{$task->is_completed ? 'completed' : 'not completed'}}
    </div>

 <div>
     <form method="post" action="{{route('tasks.taskToggle',['task'=>$task])}}">
         @csrf
         @method('PUT')
         <button type="submit">
             Mark as {{$task->is_completed ? 'not completed' : ' completed'}}
         </button>
     </form>
 </div>
    <div>
        <a href="{{route('tasks.edit',['task'=>$task])}}">Edit Task</a>
    </div>


    <div>
        <form action="{{route('tasks.delete',['task'=> $task])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
