<?php

namespace App\Http\Livewire\Users;

use App\Models\PrRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChartExercise extends Component
{
    public $exercises;
    public $selectedExercise = '';
    public $prRecords;
    public $prs, $reps, $dates;
    public function mount()
    {
        $this->exercises = PrRecord::where('user_id', Auth()->id())->pluck('exercise')->unique();
        // $this->updateExerciseLabel();
        $this->updateExercise();
    }

    public function updateExercise()
    {
        $this->prRecords = PrRecord::where('user_id', Auth()->id())->where('exercise', $this->selectedExercise)->get();
        $this->dates = $this->prRecords->pluck('created_at')->map(function ($date) {
            return $date->format('d-m-Y');
        });
        $this->prs = $this->prRecords->pluck('pr');
        // $this->reps = $this->prRecords->pluck('reps');  
        $this->emit('updateTheChart');
    }


    public function render()
    {
        return view('livewire.users.chart-exercise');
    }
}
