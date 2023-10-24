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
    public $exercisesArray = [
        ['exercise_id' => null, 'sets' => null, 'reps' => null]
    ];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'level' => 'required',
        'duration' => 'required',
        // 'exercisesArray.*.exercise_id' => 'required',
        'exercisesArray.*.sets' => 'required',
        'exercisesArray.*.reps' => 'required',
    ];


    public function render()
    {
        $exercises = Exercise::orderBy('name', 'asc')->get();
        return view('livewire.routines.create-routine', compact('exercises'));
    }

    public function addExercise()
    {
        //Agregamos nueva fila  
        $this->exercisesArray[] = ['exercise_id' => null, 'sets' => null, 'reps' => null];
    }

    public function save()
    {
        $this->validate();
        // dd(is_null($this->exercisesArray[0]['exercise_id']));
        if (!is_null($this->exercisesArray[0]['exercise_id'])) {
            // Crea la rutina
            $routine = Routine::create([
                'name' => $this->name,
                'description' => $this->description,
                'level' => $this->level,
                'duration' => $this->duration,
            ]);
            foreach ($this->exercisesArray as $exerciseData) {
                // Aseguramos de que el ejercicio seleccionado no sea nulo
                if ($exerciseData['exercise_id']) {
                    // Guarda la relación en la tabla pivote
                    $routine->exercises()->attach($exerciseData['exercise_id'], [
                        'user_id' => Auth::user()->id,
                        'sets' => $exerciseData['sets'],
                        'reps' => $exerciseData['reps'],
                    ]);
                }
            }
            $this->reset(['open', 'name', 'description', 'level', 'duration', 'exercisesArray']);
            $this->emitTo('routines.show-routines', 'render');
            $this->emit('alert', 'La rutina se creó satisfactoriamente');
        }else{
            session()->flash('message', 'Seleciona por lo menos un ejercicio');
        }
    }


    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['open', 'name', 'description', 'level', 'duration','exercisesArray' ]);
        }
    }


}