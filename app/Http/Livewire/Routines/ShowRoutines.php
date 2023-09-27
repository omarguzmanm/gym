<?php

namespace App\Http\Livewire\Routines;

use Livewire\Component;

class ShowRoutines extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.routines.show-routines');
    }
}
