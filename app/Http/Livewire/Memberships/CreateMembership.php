<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Membership;
use Livewire\Component;
use Illuminate\Validation\Rule;


class CreateMembership extends Component
{
    public $open = false;
    public $type, $plan, $price;



    public function submit()
    {

        $this->validate([
            'type' => [
                'required',
                Rule::unique('memberships') // Verifica que el valor sea único en la columna 'type'
            ],
            'plan' => 'required',
            'price' => 'required'
        ]);


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