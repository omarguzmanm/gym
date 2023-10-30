<?php

namespace App\Http\Livewire\Routines;

use App\Models\Routine;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowRoutineExercises extends Component
{
    public $routine;

    public function mount(Routine $id)
    {
        $this->routine = $id->load('exercises');
    }

    public function render()
    {
        return view('livewire.routines.show-routine-exercises');
    }
}
