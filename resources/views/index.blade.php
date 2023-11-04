@extends('layouts.app')
@section('title','the list of tasks')


@section('content')

<nav class="mb-4">
<a href="{{route('tasks.create')}}"
    
   class='font-medium text-gray-700 underline decoration-pink-500'> Add tasks! </a>

</nav>

<div>
 {{-- @if(count($tasks))  --}}


@forelse ($tasks as $task)
   <div> 
    <a href="{{ route('tasks.show',['task'=>$task->id]) }}"
    
       @class(['font-bold','line-through'=>$task->completed])> {{$task->title}}   </a>
    
</div>
@empty  
    <p>No users </p>
@endforelse
{{-- @dd($tasks->links()) --}}
@if($tasks->count())
<nav class="mt-4  text-2xl">
    {{$tasks->links()}}
</nav>
@endif

@endsection

