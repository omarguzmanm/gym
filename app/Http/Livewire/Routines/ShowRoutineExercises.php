<?php

namespace App\Http\Livewire\Routines;

use App\Models\Exercise;
use App\Models\PrRecord;
use App\Models\Rating;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowRoutineExercises extends Component
{
    public $routine;
    public $open_pr = false, $open_rate = false;
    public $exercise, $pr, $reps;  //Exercise
    public $rating;
    public function mount(Routine $id)
    {
        $this->routine = $id->load('exercises');
    }

    protected $rules = [
        'pr' => 'required',
        'reps' => 'required',
    ];

    public function render()
    {
        return view('livewire.routines.show-routine-exercises');
    }

    public function createPr(Exercise $exercise)
    {
        $this->open_pr = true;
        $this->exercise = $exercise->name;
    }

    public function createRate(Routine $routine)
    {
        $this->open_rate = true;
        $this->routine = $routine;
    }

    public function save()
    {
        $this->validate();
        PrRecord::create([
            'user_id' => Auth()->id(),
            'exercise' => $this->exercise,
            'pr' => $this->pr,
            'reps' => $this->reps
        ]);
        $this->reset(['exercise', 'pr', 'reps', 'open_pr']);

        // $this->emitTo('routines.show')
        $this->emit('alert', 'El PR se agregó satisfactoriamente');

    }

    public function saveRating()
    {
        Rating::create([
            'routine_id' => $this->routine->id,
            'rate' => $this->rating
        ]);
        $this->reset(['rating', 'open_rate']);
    }

}
