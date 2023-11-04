@extends('layouts.app')
@section('title',isset($task)? 'Edit Task':'Add Task')
    

@section ('styles') 
<style>
.error-message{
    color:red;
}
</style>
@endsection

@section('content')
    <form method="POST" action ="{{ isset($task) ? route('tasks.update',['task'=>$task->id]) : route('tasks.store') }}">
    
     @csrf
     @isset($task)
      @method('PUT')
     @endisset
    <div>
        <label for="title">
            Title
        </label> 
        <input class="px-4 py-4" type="text" name="title" id="title" value="{{$task->title ?? old('title')}}" />
        @error('title')
        <p class="error-message">{{$message}} </p>
        @enderror
    </div>

     <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="5" >{{$task->description ??old('description')}}</textarea>
      @error('description')
      <p class="error-message">{{$message}} </p>
      @enderror
     </div>
      
     
     <div>
        <label for="long_description">long Description</label>
        <textarea name="long_description" id="long_description" rows="5"  > {{$task->long_description ?? old('long_description')}} </textarea>
        @error('long_description')
        <p class="error-message">{{$message}} </p>
        @enderror
       </div>
       
      
     <div>
        <label for="summary">Summary</label>
        <textarea name="summary" id="summary" rows="5"  >{{$task->summary ?? old('summary')}}</textarea>
        @error('summary')
        <p class="error-message">{{$message}} </p>
        @enderror
       </div>
     

       

       <div class="mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded" type="submit">
                @isset($task)
                Update task
                @else
                Add task 
                @endisset 
        </button>
       </div>
  
     
    </form>
@endsection