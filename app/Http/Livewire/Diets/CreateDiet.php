<?php

namespace App\Http\Livewire\Diets;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;

class CreateDiet extends Component
{
    public $open = false;

    public $user_id;

    public $description;
 
    protected $rules = [
        'user_id' => 'required',
        'description' => 'required',
    ];
 
    public function mount(){
        // $this->resetForm();
    }

    public function save()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $diet = Diet::create([
            'description' => $this->description
        ]);
        Analysis::where('user_id', $this->user_id)->whereNull('diet_id')->update(['diet_id' => $diet->id]);
        // $diet->analysis()->where('user_id', $this->user_id)->->toSql();
        // Analysis::update(['id_diet' =>$this->id_analysis]);
        
        //Reseteamos todos los valores del form/modal
        $this->reset(['open','user_id', 'description']);
        $this->emitTo('diets.show-diets', 'render');
        $this->emit('alert', 'La dieta se creó correctamente.');

    }
    
    public function render()
    {
        // $userAnalysis = Diet::with('analysis')->get();
        $userAnalysis = Analysis::with('users')->get();
        // dd($userAnalysis);
        return view('livewire.diets.create-diet', compact('userAnalysis'));
        // return view('livewire.diets.create-diet-user');
    }

}
