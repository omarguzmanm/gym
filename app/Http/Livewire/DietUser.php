<?php

namespace App\Http\Livewire;
use App\Models\Analysis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diet;


use Livewire\Component;

class DietUser extends Component
{
    public $showForm = true;

    public function toggleForm($showForm)
{
    $this->showForm = $showForm;
}
    public function render()
    {
        $userAnalysis = Analysis::with('user')->get();
        return view('livewire.diets.diet-user', compact('userAnalysis'));
    }

}
