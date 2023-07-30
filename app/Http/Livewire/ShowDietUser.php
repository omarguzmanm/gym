<?php

namespace App\Http\Livewire;


use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;

class ShowDietUser extends Component
{
    public $search = '';

    public function render()
    {
        $userDiet = Analysis::with('users', 'diets')
            ->whereHas('users', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->whereNotNull('id_diet')
            ->get();

        return view('livewire.diets.show-diet-user', compact('userDiet'));

    }
}