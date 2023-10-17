<?php

namespace App\Http\Livewire\Routines;

use App\Models\Exercise;
use App\Models\Routine;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditRoutine extends Component
{
    public $routine;
    public $open_edit;
    public $showExercise = false;
    public $exercisesArray = [];

    public function mount(Routine $routine)
    {
        $this->routine = $routine;
    }

    protected $rules = [
        'routine.name' => 'required',
        'routine.description' => 'required',
        'routine.level' => 'required',
        'routine.duration' => 'required',
        'exercisesArray.*.sets' => 'required',
        'exercisesArray.*.reps' => 'required',
    ];


    public function render()
    {
        // $exercisesArray = $this->routine->exercises;
        $exercises = Exercise::all();
        // dd($exercisesArray);
        return view('livewire.routines.edit-routine', compact( 'exercises'));
    }

    
    public function edit(Routine $routine)
    {
        $this->routine = $routine;
            // Iteramos sobre cada modelo de la colección de la releacion
        $this->exercisesArray = $routine->exercises->map(function ($exercise) {
            return [
                'id' => $exercise->id,
                'exercise_id' => $exercise->id,
                'sets' => $exercise->pivot->sets,
                'reps' => $exercise->pivot->reps,
            ];
        })->toArray();
        // dd($this->exercisesArray);
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        // Actualiza los datos de la rutina
        $this->routine->save();
    
        // Actualiza los datos en la tabla pivote
        $exerciseData = []; //Guardamos datos de cada ejercicio
        foreach ($this->exercisesArray as $exercise) {
            $exerciseData[$exercise['exercise_id']] = [
                'user_id' => Auth()->user()->id,
                'sets' => $exercise['sets'],
                'reps' => $exercise['reps'],
            ];
        }
        $this->routine->exercises()->sync($exerciseData);
    
        // Cierra el modal después de la actualización
        $this->open_edit = false;
        //Borramos los valores de los inputs
        $this->reset(['open_edit']);
        
        // Emitir eventos para volver a renderizar y mostrar una alerta
        $this->emitTo('routines.show-routines', 'render');
        $this->emit('alert', 'La rutina se actualizó satisfactoriamente');
    }

    public function addExercise()
    {
        //Agregamos nueva fila  
        $this->exercisesArray[] = ['exercise_id' => null, 'sets' => null, 'reps' => null];
    }

    public function deleteExercise($exerciseId)
    {
        // Encuentra el índice del ejercicio en $exercisesArray
        $exerciseIndex = array_search($exerciseId, array_column($this->exercisesArray, 'exercise_id'));
        // Si encontramos el ejercicio en el arreglo, lo eliminamos
        if ($exerciseIndex !== false) {
            unset($this->exercisesArray[$exerciseIndex]);
            // Reindexa el arreglo para mantenerlo limpio
            $this->exercisesArray = array_values($this->exercisesArray);
        }
    }
    

    
}
