<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditExercise extends Component
{
    use WithFileUploads;

    public $exercise, $media;
    public $open_edit = false;

    protected $rules = [
        'exercise.name' => 'required',
        'exercise.description' => 'required',
        'exercise.muscle_group' => 'required',
        'media' => 'required|image|max:2048',
        // 'exercise.type' => 'required',
        'exercise.equipment' => 'required',
        // 'exercise.type' => 'required',
    ];
    public function mount(Exercise $exercise)
    {
        $this->exercise = $exercise;
    }

    public function edit(Exercise $exercise)
    {
        $this->exercise = $exercise;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if($this->media){
            Storage::delete([$this->exercise->media]);
            $this->exercise->media = $this->media->store('exercises');
        }
        $this->exercise->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'media']);
        $this->emitTo('exercises.show-exercises','render');
        $this->emit('alert', 'El ejercicio se actualizó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.exercises.edit-exercise');
    }
}
