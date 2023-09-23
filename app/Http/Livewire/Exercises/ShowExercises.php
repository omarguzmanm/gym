<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;

class ShowExercises extends Component
{
    public $search = '';
    public $open_edit;
    public $exercise;

    protected $listeners = ['render'];


    protected $rules = [
        'exercise.name' => 'required',
        'exercise.description' => 'required',
        'exercise.muscle_group' => 'required',
        'exercise.type' => 'required',
        'exercise.equipment' => 'required',
        // 'exercise.type' => 'required',
    ];


    public function mount()
    {
        $this->exercise = new Exercise();
    }

    public function render()
    {
        $exercises = Exercise::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        return view('livewire.exercises.show-exercises', compact('exercises'));
    }

    public function showExerciseDetails(Exercise $exercise)
    {
        $this->exercise = $exercise;
    }

    public function edit(Exercise $exercise)
    {
        $this->exercise = $exercise; // Cargamos una copia fresca del ejercicio desde la base de datos.
        // dd($this->exercise->id);
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        $this->exercise->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit']);


        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }



}