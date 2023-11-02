<?php

namespace App\Http\Livewire\Users;

use App\Models\PrRecord;
use Livewire\Component;

class FilterChart extends Component
{
    public $selectedExercise = null;

    public $exercises;
    public function mount()
    {
        $this->exercises = PrRecord::where('user_id', Auth()->id())->pluck('exercise')->unique();
    }

    public function onExerciseChange()
    {
        $this->emit('exercise-selected', $this->selectedExercise);
    }
    public function render()
    {
        return view('livewire.users.filter-chart');
    }
}
