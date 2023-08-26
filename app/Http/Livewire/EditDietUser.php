<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;

class EditDietUser extends Component
{
    public $open = false;
    public $analysis, $identifier;
    // public $userToEdit;


    public function mount(Analysis $analysis){
        $this->analysis = $analysis;
        // $this->identifier = rand();
    }


    public function render()
    {
        return view('livewire.diets.edit-diet-user');
    }
}
