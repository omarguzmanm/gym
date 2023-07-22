<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;

    public $name, $phone_number, $address, $membership, $image, $identifier;

    public function mount()
    {
        $this->identifier = rand();
    }

    protected $rules = [
        'name'              => 'required',
        'phone_number'      =>  'required',
        'address'           =>  'required',
        'membership'        =>  'required',
        'image'             => 'required|image|max:2048'
    ];

    public function save()
    {
        $this->validate();

        $image = $this->image->store('users');


        User::create([
            'name'     =>  $this->name,
            'phone_number'   =>  $this->phone_number,
            'address'   => $this->address,
            'membership'   => $this->membership,
            'image'     =>  $image
        ]);

        //Borramos los valores de los inputs
        $this->reset(['open', 'name', 'phone_number', 'address', 'image']);

        $this->identifier = rand();

        // Emitimos un evento
        // $this->emit('render');
        $this->emitTo('show-users', 'render');

        $this->emit('alert', 'El usuario se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-user');
    }

    public function updatingOpen(){
        if($this->open == false){
            $this->reset(['name', 'phone_number','address', 'image']);
            $this->identifier = rand();
            $this->emit('resetCKEditor');

        }
    }
}
