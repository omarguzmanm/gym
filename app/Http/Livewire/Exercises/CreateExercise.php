<?php

namespace App\Http\Livewire\Exercises;

use Livewire\Component;

class CreateExercise extends Component
{
    public $open = false;

    public $name, $description, $muscle_group, $type, $equipment, $media;

    


    public function render()
    {
        return view('livewire.exercises.create-exercise');
    }

}
