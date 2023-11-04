<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// root.


// Before dummy data fake data we are using this.
// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];






Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks',function(){
  
  return view('index',[
   'tasks'=> Task::latest()->paginate(10)
  ]);

})->name('tasks.index');


Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function(Task $task) {
   

   return view ('edit',[
    
    'task'=> $task 
  
  ]);

  })->name('tasks.edit');



Route::get('/tasks/{task}', function(Task $task) {
  
  // this is my logic 
// if(is_null(\App\Models\Task::find($id))){
//   abort(404,'Page not found');
// }
   // one line logic in which it aborts the operations if it does not find any id. or null.



   return view ('show',[
    
    'task'=> $task
  
    ]);

  })->name('tasks.show');

 Route::post('/tasks',function(TaskRequest $req){
   $task=Task::create($req->validated()); 
  return redirect()->route('tasks.show',['task'=>$task->id])
  ->with('success','task created succefully');
 
})->name('tasks.store');



Route::put('/tasks/{task}', function (Task $task,TaskRequest $req){

  $task->update($req->validated()); 
  return redirect()->route('tasks.show',['task'=>$task->id])
  ->with('success','task updated  succefully');

})->name('tasks.update');

Route::delete('/tasks/{task}',function(Task $task){
  $task->delete();
  return redirect()->route('tasks.index')->with('success','task deleted successfully');
})->name('tasks.destroy');


// task completed

Route::put('tasks/{task}/toggle-complete',function(Task $task){
 
  $task->toggleComplete();
  return redirect()->back()->with('success','Task updated successfully');


})->name('tasks.toggle-complete');


// Route::get('/xxx',  function () {
//     return 'welcome';
// })->name('hello');

// Route::get('/hallo',function(){
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}',function($name){
//  return  $name;
// });

