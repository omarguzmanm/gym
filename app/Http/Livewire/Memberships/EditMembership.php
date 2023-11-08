<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Appointment;
use App\Models\Membership;
use Livewire\Component;

class EditMembership extends Component
{
    public $membership;
    public $open_edit = false;

    protected $rules = [
        'membership.type'    => 'required',
        'membership.plan'  => 'required',
        'membership.price'  => 'required',
    ];

    public function mount(Membership $membership)
    {
        $this->membership = $membership;
    }

    public function render()
    {
        // $types = Membership::pluck('type')->unique();
        // $plans = Membership::pluck('plan')->unique();
        // dd($types);
        // return view('livewire.memberships.edit-membership', compact('types', 'plans'));
        return view('livewire.memberships.edit-membership');
    }

    public function edit(Membership $membership)
    {
        $this->membership = $membership;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->membership->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit']);
        $this->emitTo('memberships.admin-memberships', 'render');
        $this->emit('alert', 'La membresia se actualizó satisfactoriamente');
    }


}
