<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\Analysis;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{

    use WithFileUploads;
    // public $editingUserId = null;

    public $open = false;
    public $open_edit = false;

    public $user, $image, $identifier;  
    protected $rules = [
        'user.name'    => 'required',
        'user.phone_number'  => 'required',
        'user.address'  => 'required'

    ];
    public function mount(User $user){
        $this->user = $user;
        $this->identifier = rand();
    }
    
    public function edit(User $user)
    {
        $this->user = $user;
        // dd($this->user);
        // dd(Storage::url($user->profile_photo_path));
        // $this->editingUserId = $user->id;

        $this->open_edit = true;
    }


//     public function closeEditForm()
// {
//     $this->open_edit = false;
//     $this->editingUserId = null;
// }

    public function update()
    {
        $this->validate();
        if ($this->image) {
            Storage::delete([$this->user->profile_photo_path]);
            $this->user->profile_photo_path = $this->image->store('users');
        }

        $this->user->save();
        // $this->open_edit = false;  Cierra el modal después de la actualización

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);

        $this->identifier = rand();

        $this->emitTo('users.show-users', 'render');
        
        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
