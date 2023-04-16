<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{
    use WithFileUploads;
    public $open = false;
    public $user, $image, $identifier;   //Propiedad post
    protected $rules = [
        'post.name'    => 'required',
        'post.phone_number'  => 'required'
    ];
    public function mount(User $user){
        $this->user = $user;
        $this->identifier = rand();
    }
    public function save(){
        $this->validate();

        if($this->image){
            Storage::delete([$this->user->image]);
            $this->user->image = $this->image->store('users');
        }

        $this->post->save();

        //Borramos los valores de los inputs
        $this->reset(['open', 'image']);

        $this->identifier = rand();

        $this->emitTo('show-users', 'render');

        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
