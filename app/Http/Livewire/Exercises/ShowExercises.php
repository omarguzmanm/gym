<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowExercises extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $open_edit = false, $showExercise = false;
    public $exercise, $image, $identifier;

    protected $listeners = ['render', 'delete'];

    public function mount()
    {
        $this->identifier = rand();
        $this->exercise = new Exercise();
    }

    // public function updatingSearch(){
    //     $this->resetPage();
    // }

    public function render()
    {
        $exercises = Exercise::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        return view('livewire.exercises.show-exercises', compact('exercises'));
    }

    public function showExerciseDetails(Exercise $exercise)
    {
        $this->exercise = $exercise;
        $this->showExercise = true;
    }
                
    public function delete(Exercise $exercise)
    {
        // Se ocupan las imagenes para este metodo
        if ($exercise->media) {
            Storage::delete([$exercise->media]);
        }
        $exercise->delete();
        $this->reset(['showExercise']);
    }

}