<div id="search-bar">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <form>
        <input type="search"id="search" wire:model.live.debounce.500ms="search" placeholder="Find task here" >

    </form>
  @if(sizeof($tasks)>0)
  <div>
    @foreach($tasks as $task)
    <div class="px-3 py-1 border-bottom">

    <div class="d-flex flex-column ml-3">

      <span>{{$task->title}}</span>

    </div>


    </div>

  </div>
  @endforeach

</div>
@endif
