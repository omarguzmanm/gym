<?php

namespace App\Http\Livewire;


use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;

class ShowDietUser extends Component
{
    public function render()
    {
        return view('livewire.diets.show-diet-user');
    }
}
