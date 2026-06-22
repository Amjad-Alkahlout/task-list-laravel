<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return redirect()->route("tasks.index");
});

// we pass an array to the route
Route::get('/tasks', function () {
    return view('index', [
        'tasks'=>Task::all()
    ]);
})->name('tasks.index'); // calling the routes using specific names that have common prefix

Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', [
        'task'=> $task
    ]);
})->name('tasks.show'); // calling the routes using specific names that have common prefix

Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit', [
        'task'=> $task
    ]);
})->name('tasks.edit');

Route::post('/tasks', function ( TaskRequest $request) {
    $task=Task::create($request->validated());
    return redirect()->route("tasks.show", $task->id)
        ->with('message', 'Task created!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task , TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route("tasks.show", $task->id)
        ->with('message', 'Task updated!');
})->name('tasks.update');

Route::fallback(function () {
    return "page not found";
});


