<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;

class ShowExercises extends Component
{
    public $search;
    public $selectedExercise = null;

    protected $listeners = ['render'];

    public function render()
    {
        $exercises = Exercise::where('name', 'like', '%' . $this->search . '%')
                                ->paginate(10); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        return view('livewire.exercises.show-exercises', compact('exercises'));
    }

    public function showExerciseDetails(Exercise $exercise)
    {
        $this->selectedExercise = $exercise;
    }
    

}