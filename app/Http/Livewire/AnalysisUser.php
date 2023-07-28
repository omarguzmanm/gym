<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\User;
use Illuminate\Http\Request;

use Livewire\Component;

class AnalysisUser extends Component
{


    public $showForm = true; // Establecer el formulario como la vista inicial

    public function render()
    {
        return view('livewire.analysis.analysis-user');
    }
}