<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Membership;
use Livewire\Component;

class CreateMembership extends Component
{
    public $open = false;
    public $type, $plan, $price;


    public function submit()
    {
        Membership::create([
            'type' => $this->type,
            'plan' => $this->plan,
            'price' => $this->price
        ]);
        $this->reset(['open', 'type', 'plan', 'price']);
        // $this->emitTo('admin-memberships', 'render');
        $this->emit('alert', 'La membresia se creó correctamente.');
        $this->emit('membershipAdded'); // Emitir evento personalizado

    }


    public function render()
    {
        $memberships = Membership::pluck('plan')->unique();
        return view('livewire.memberships.create-membership', compact('memberships'));
    }
}