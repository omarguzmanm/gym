<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ShowExercises extends Component
{
    use WithFileUploads;

    public $search = '';
    public $open_edit;
    public $exercise, $image, $identifier;

    protected $listeners = ['render', 'delete'];


    protected $rules = [
        'exercise.name' => 'required',
        'exercise.description' => 'required',
        'exercise.muscle_group' => 'required',
        'exercise.media' => 'required',
        // 'exercise.type' => 'required',
        'exercise.equipment' => 'required',
        // 'exercise.type' => 'required',
    ];


    public function mount()
    {
        $this->identifier = rand();
        $this->exercise = new Exercise();
    }

    public function updatingSearch(){
        $this->resetPage();
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
        if($this->image){
            Storage::delete([$this->exercise->media]);
            $this->exercise->media = $this->image->store('exercise');
        }
        $this->exercise->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);
        $this->emit('alert', 'El ejercicio se actualizó satisfactoriamente');
    }

    public function delete(Exercise $exercise)
    {
        // Se ocupan las imagenes para este metodo
        Storage::delete([$exercise->media]);
        $exercise->delete();

    }

}