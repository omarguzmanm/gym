<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\Analysis;
use App\Models\Membership;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{

    use WithFileUploads;
    public $open_edit = false;

    public $user, $image, $identifier; 
    
    // public $membershipSelected;
    protected $rules = [
        'user.name'    => 'required',
        'user.phone_number'  => 'required',
        'user.address'  => 'required',
        'image' => 'max:2048',
    ];
    public function mount(User $user){
        $this->user = $user;
        $this->identifier = rand();
    }
    
    public function edit(User $user)
    {
        $this->user = $user;
        //  Se obtiene el ID de la membresía desde el primer resultado de la relación
        // $membershipId = $this->user->memberships[0]->pivot->membership_id;
        //  Realiza una consulta para encontrar la membresía relacionada a través de la tabla pivote
        // $this->membershipSelected = Membership::whereHas('users', function ($query) use ($membershipId) {
        //     $query->where('membership_id', $membershipId); })->first();
        // dd($memberhip);
        $this->open_edit = true;
    }

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
