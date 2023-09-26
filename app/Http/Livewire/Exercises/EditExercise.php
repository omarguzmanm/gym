<?php

namespace App\Http\Livewire\Exercises;

use Livewire\Component;

class EditExercise extends Component
{

    public $media;

    public function render()
    {
        return view('livewire.exercises.edit-exercise');
    }
}
