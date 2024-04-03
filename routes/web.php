<?php

use \App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks'=> Task::all(),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create' )->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', [
        'task'=> $task
    ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit', [
        'task'=> $task
    ]);
})->name('tasks.edit');

Route::post('/tasks', function(TaskRequest $request) {
   
//    $data = $request->validated();
//    $task = new Task;
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//    $task->save();

   $task = Task::create($request->validated());

   return redirect()->route('tasks.show', ['task' => $task->id])
   ->with('sucess', 'Task Created Sucessfully');    
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
  
 
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task->update($request->validated());
 
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('sucess', 'Task Updated Sucessfully');    
 })->name('tasks.update');

 Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('sucess','Task Deleted Sucessfully');
 })->name('tasks.destroy');

// Route::get('/hello', function () {
//     return 'hello';
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!' ;
// });

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::fallback(function () {
//     return 'Still got somewhere!';
// });
