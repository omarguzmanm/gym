<?php

namespace App\Http\Livewire\Clients;

use App\Models\Analysis;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination; //Paginación dinamica

class ShowNutrition extends Component
{
    use WithPagination;

    public $user;
    public $selectedYear;
    public $progress, $kg;
    public $years;
    public $months;

    public function mount()
    {
        $this->user = User::find(Auth::id());
        $analyses = $this->user->analyses()->wherePivot('user_id', $this->user->id)->pluck('analyses.created_at');

        $this->years = $analyses->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();
    }

    public function updatedSelectedYear()
    {
        $this->progress = $this->user->analyses()->wherePivot('user_id', $this->user->id)->whereYear('analyses.created_at', $this->selectedYear)->get();
        $this->months = $this->progress->pluck('created_at')->map(function ($date) {
            return $date->format('F');
        })->unique();
        $this->kg = $this->progress->pluck('weight');
        $this->emit('updatekgChart');
    }


    public function render()
    {
        $diets = $this->user->analyses()->wherePivot('user_id', $this->user->id)->whereYear('analyses.created_at', $this->selectedYear)->orderBy('analyses.created_at', 'asc')->paginate(10);
        // dd($this->diets);
        return view('livewire.clients.show-nutrition', compact('diets'));
    }
}
