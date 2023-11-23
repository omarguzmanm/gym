<?php

namespace App\Http\Livewire\Clients;

use App\Models\Analysis;
use App\Models\Diet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowNutrition extends Component
{
    public $diets;
    public $selectedYear;
    public $years;


    public function render()
    {
        $this->diets = Analysis::with('users', 'diets')
            ->whereHas('diets', function ($query) {
                $query->whereNotNull('diet_id');
            })->whereHas('users', function ($query) {
            $query->where('users.id', Auth::id());
        })->get();
        return view('livewire.clients.show-nutrition');
    }
}
