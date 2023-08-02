<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
class CreateDietUser extends Component
{
    public $open = false;

    public $id_user;

    public $description;
 
    protected $rules = [
        'id_user' => 'required',
        'description' => 'required',
    ];
 
    public function mount(){
        // $this->resetForm();
    }

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $diet = Diet::create([
            'description' => $this->description
        ]);
        Analysis::where('id_user', $this->id_user)->whereNull('id_diet')->update(['id_diet' => $diet->id]);
        // $diet->analysis()->where('id_user', $this->id_user)->->toSql();
        // Analysis::update(['id_diet' =>$this->id_analysis]);
        
        //Reseteamos todos los valores del form/modal
        $this->reset(['open','id_user', 'description']);
        $this->emitTo('show-diet-user', 'render');
        $this->emit('alert', 'La dieta se creó correctamente.');

    }
    
    public function render()
    {
        // $userAnalysis = Diet::with('analysis')->get();
        $userAnalysis = Analysis::with('users')->get();
        // dd($userAnalysis);
        return view('livewire.diets.create-diet-user', compact('userAnalysis'));
        // return view('livewire.diets.create-diet-user');
    }
}
