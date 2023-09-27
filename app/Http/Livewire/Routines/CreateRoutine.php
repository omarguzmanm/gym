<?php

namespace App\Http\Livewire\Routines;

use App\Models\Exercise;
use App\Models\Routine;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRoutine extends Component
{
    public $open = false;
    public $name, $description, $level, $duration, $rating;
    public $selectedExercises = [];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'level' => 'required',
        'duration' => 'required',
    ];

    public function render()
    {
        $exercises = Exercise::all();
        return view('livewire.routines.create-routine', compact('exercises'));
    }


    public function save()
    {
        $this->validate();
        // dd($this->selectedExercises);
        $routine = Routine::create([
            'name' => $this->name,
            'description' => $this->description,
            'level' => $this->level,
            'duration' => $this->duration,
        ]);

        $routine->exercises()->attach($this->selectedExercises, [
            'user_id' => Auth::user()->id,
        ]);

        $this->reset(['open', 'name', 'description', 'level', 'duration']);

        $this->emit('alert', 'La rutina se creó satisfactoriamente');



    }
}
 