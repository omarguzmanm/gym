<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
class CreateDietUser extends Component
{
    public $id_analysis;
    public $showForm = false;

    public $description;
 
    protected $rules = [
        'id_analysis' => 'required',
        'description' => 'required|text',
    ];
 
    public function mount(){
        $this->id_analysis = $this->id_analysis ?? 'selecciona';
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->id_analysis = null;
        $this->description = '';
    }
    public function toggleForm($showForm)
{
    $this->showForm = $showForm;
}
    public function submit()
    {
        // $this->validate();
        // Execution doesn't reach here if validation fails.
        Diet::create([
            'id_analysis' => $this->id_analysis,
            'description' => $this->description
        ]);
        session()->flash('messageDiet', 'La dieta fue creada con éxito.');
        $this->emit('toggleForm', false);
    }
    
    public function render()
    {
        $userAnalysis = Analysis::with('user')->get();
        return view('livewire.diets.create-diet-user', compact('userAnalysis'));
    }
}
