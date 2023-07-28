<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
class CreateDietUser extends Component
{
    public $open = false;

    public $id_analysis;
    public $showForm = false;

    public $description;
 
    protected $rules = [
        'id_analysis' => 'required',
        'description' => 'required|text',
    ];
 
    public function mount(){
        // $this->resetForm();
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
        $this->validate();
        // Execution doesn't reach here if validation fails.
        Diet::create([
            'id_analysis' => $this->id_analysis,
            'description' => $this->description
        ]);
        
        //Reseteamos todos los valores del form/modal
        $this->reset(['open','id_analysis', 'description']);
        $this->emitTo('show-diet-user', 'render');
        $this->emit('alert', 'La dieta se creó correctamente.');

    }
    
    public function render()
    {
        $userAnalysis = Analysis::with('user')->get();
        return view('livewire.diets.create-diet-user', compact('userAnalysis'));
    }
}
