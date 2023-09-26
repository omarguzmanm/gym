<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{
    use WithFileUploads;
    public $open = false;
    public $open_edit = false;

    public $analysis;
    public $user, $image, $identifier;   //Propiedad post
    protected $rules = [
        'user.name'    => 'required',
        'user.phone_number'  => 'required',
        'user.address'  => 'required'

    ];
    public function mount(User $user){
        $this->user = $user;
        $this->identifier = rand();
    }
    

    public function update()
    {
        // $this->validate();

        if ($this->user->profile_photo_path) {
            // dd($this->image);
            Storage::delete([$this->user->profile_photo_path]);
            $this->user->profile_photo_path = $this->profile_photo_path->store('users');
        }

        $this->user->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);

        $this->identifier = rand();

        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }

    // public function edit(Analysis $analysis){
    //     $this->analysis = $analysis;
    //     $this->open_edit = true;
    // }

    // public function update(){
    //     $this->analysis->save();
    //     //Borramos los valores de los inputs
    //     $this->reset(['open_edit']);
    //     $this->emit('alert', 'El usuario se actualizó satisfactoriamente');

    // }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
