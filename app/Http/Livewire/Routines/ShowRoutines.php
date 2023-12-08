<?php

namespace App\Http\Livewire\Routines;

use App\Models\Exercise;
use App\Models\Routine;
use Livewire\Component;

class ShowRoutines extends Component
{
    public $search = '';
    public $open_edit = false;
    public $routine;

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'routine.name' => 'required',
        'routine.description' => 'required',
        'routine.level' => 'required',
        'routine.duration' => 'required',
        // 'user.membership' => 'required',
    ];

    public function mount()
    {
        $this->routine = new Routine();
    }

    public function render()
    {
        $routines = Routine::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.routines.show-routines', compact('routines'));
    }

    public function delete(Routine $routine)
    {
        // Eliminamos todas las relaciones en la tabla pivote
        $routine->exercises()->detach();
        // Eliminamos la rutina
        $routine->delete();
        $routine->ratings()->delete();
    }
    

}
