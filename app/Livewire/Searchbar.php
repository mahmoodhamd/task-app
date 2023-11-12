<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class Searchbar extends Component
{

    public $search="";

    public function render()
    {

      $results=[];
      if(strlen($this->search)>=1){
        $results=Task::where('title','like','%'.$this->search.'%')->get();
      }


        return view('livewire.search-bar',[
        'tasks'=>$results
        ]);
    }
}
