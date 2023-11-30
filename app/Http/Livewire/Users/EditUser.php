<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\Analysis;
use App\Models\Membership;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class EditUser extends Component
{

    use WithFileUploads;
    public $open_edit = false;

    public $user, $image, $identifier;

    // public $membershipSelected;
    protected $rules = [
        'user.name' => 'required',
        'user.phone_number' => 'required',
        'user.address' => 'required',
        'image' => 'max:2048',
    ];
    public function mount(User $user)
    {
        $this->user = $user;
        $this->identifier = rand();
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->image) {
            // Eliminamos la imagen anterior
            Cloudinary::destroy($this->user->public_id_photo);
            // Subimos la nueva imagen
            $newImage = Cloudinary::upload($this->image->getRealPath(), ['folder' => 'gym/users'])->getSecurePath();
            $this->user->profile_photo_path = $newImage;
            // Eliminamos la imagen temporal
            File::delete($this->image->getRealPath());
        }

        $this->user->save();

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
