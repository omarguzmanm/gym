<?php

namespace App\Http\Livewire\Clients;

use App\Models\PrRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Membership;

class ShowMyProgress extends Component
{
    public $hasActiveMembership;
    public $exercises;
    public $selectedExercise = '';
    public $prRecords;
    public $prs, $reps, $dates;
    public function mount($exercise = null)
    {
        // En caso que se pase por URL un ejercicio
        $this->selectedExercise = $exercise ?? '';
        $this->updatedSelectedExercise();

        $this->exercises = PrRecord::where('user_id', Auth()->id())->pluck('exercise')->unique();
        // Verificamos si el usuario tiene una membresia activa
        $this->hasActiveMembership = Auth::user()->memberships()->wherePivot('renew_date', '>=', Carbon::now())->exists();
    }

    public function updatedSelectedExercise()
    {
        $this->prRecords = PrRecord::where('user_id', Auth()->id())->where('exercise', $this->selectedExercise)->get();
        $this->dates = $this->prRecords->pluck('created_at')->map(function ($date) {
            return $date->format('d-m-Y');
        });
        // dd($this->dates);
        $this->prs = $this->prRecords->pluck('pr');
        $this->reps = $this->prRecords->pluck('reps');

        $this->emit('updatePRChart'); // Para actualizar la primera gráfica
        $this->emit('updateRepsChart'); // Para actualizar la segunda gráfica
    }
    public function render()
    {
        return view('livewire.clients.show-my-progress');
    }
}
