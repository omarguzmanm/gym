<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;

class CreateExercise extends Component
{
    public $open = false;

    public $name, $description, $muscle_group, $type, $equipment, $media;


    public function render()
    {
        return view('livewire.exercises.create-exercise');
    }

    public function save()
    {
        $exercise = Exercise::create([
            'name' => $this->name,
            'description' => $this->description,
            'muscle_group' => $this->muscle_group,
            'type' => $this->type,
            'equipment' => $this->equipment,
        ]);

        $this->reset(['open','name', 'description', 'muscle_group', 'type', 'equipment']);
        $this->emitTo('exercises.show-exercises', 'render');


    }

}
