<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditDietUser extends Component
{
    use WithFileUploads;

    public $open_edit = false;
    public $diet, $identifier;
    // public $userToEdit;


    public function mount(Diet $diet){
        // $this->identifier = rand();
        $this->diet = $diet;
    }

    protected $rules = [
        'diet.description' => 'required',
    ];

    public function edit(Diet $diet){
        $this->diet = $diet;
        $this->open_edit = true;
    }

    
    public function update(){
        $this->diet->save();
        //Borramos los valores de los inputs
        $this->reset(['open_edit']);
        // $this->identifier = rand();

        $this->emit('alert', 'La dieta se actualizó satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.diets.edit-diet-user');
    }
}
