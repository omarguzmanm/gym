<?php

namespace App\Http\Livewire\Routines;

use App\Models\Routine;
use Livewire\Component;

class ShowRoutines extends Component
{
    public $search = '';
    public $open_edit = false;
    public $routine;

    public $exercises = [];

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
        // $this->identifier = rand();
        $this->routine = new Routine();
    }

    public function render()
    {
        // $routines = Routine::where('name', $this->search)->get();
        $routines = Routine::where('name', 'like', '%' . $this->search . '%')
                    ->paginate(10);
                    
        return view('livewire.routines.show-routines', compact('routines'));
    }

    public function edit(Routine $routine)
    {
        $this->routine = $routine;
        $this->exercises = $routine->exercises;
        // dd($this->exercises);



        // $routineId = $routine->id;
        // $this->selectedExercises = Routine::whereHas('exercises', function ($query) use ($routineId) {
        //     $query->where('routine_id', $routineId);
        // })->with('exercises')->get();


        // dd($this->user);
        // dd(Storage::url($user->profile_photo_path));
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        // if ($this->image) {
        //     Storage::delete([$this->user->profile_photo_path]);
        //     $this->user->profile_photo_path = $this->image->store('users');
        // }

        $this->routine->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit']);

        // $this->identifier = rand();

        $this->emitTo('routines.show-routines', 'render');
        
        $this->emit('alert', 'La rutina se actualizó satisfactoriamente');
    }


    public function delete(Routine $routine)
    {
        $routine->delete();
    }

}
