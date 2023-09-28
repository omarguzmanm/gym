<?php

namespace App\Http\Livewire\Routines;

use App\Models\Routine;
use Livewire\Component;

class ShowRoutines extends Component
{
    public $search = '';
    public function render()
    {
        // $routines = Routine::where('name', $this->search)->get();
        $routines = Routine::where('name', 'like', '%' . $this->search . '%')
                    ->paginate(10);
                    
        return view('livewire.routines.show-routines', compact('routines'));
    }
}
