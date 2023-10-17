<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;


use App\Models\Membership;
use App\Models\User;

class EditRenew extends Component
{
    public $user, $image, $identifier;
    public $open_editRenew = false;
    public $type, $plan, $price, $id_membership, $status;
    public $types = [], $plans = [], $prices = [];
    protected $rules = [
        'user.name'    => 'required',
        'user.phone_number'  => 'required',
        'user.address'  => 'required'

    ];
    public function mount(User $user)
    {
        // $this->identifier = rand();
        $this->user = $user;
        $this->types = Membership::pluck('type')->unique();
        $this->plans = collect();
    }

    public function render()
    {
        return view('livewire.users.edit-renew');
    }

    public function updatedType($value)
    {
        $this->plans = Membership::where('type', $value)->get();
        $this->plan = $this->plans->first()->id ?? null;
        $this->price = $this->plans->first()->price ?? null;
        $this->id_membership = $this->plans->first()->id ?? null;
    }

    public function updatedPlan($value)
    {
        $this->prices = Membership::where('id', $value)->get();
        $this->price = $this->prices->first()->price ?? null;
        $this->id_membership = $this->prices->first()->id ?? null;
    }


    public function editRenew(User $user)
    {
        $this->user = $user;

        // Carga las relaciones nuevamente
        $this->user->load('memberships');
    
        $memberships = $this->user->memberships;
        $this->price = $memberships->pluck('price');
        $this->type = $memberships->pluck('type')->first();
         // dd($this->type);
        // Obtiene el estado de la membresía actual del usuario
        $this->status = $memberships->firstWhere('pivot.user_id', $this->user->id)->pivot->status;
    
        // Guardamos todos los planes de la mebresia seleccionada
        $this->plans = Membership::where('type', $this->type)->get();
        // Filtra los planes de membresía disponibles 
        $planSelected = Membership::where('type', $this->type)->whereIn('price', $this->price)->first();
        // Define el plan seleccionado (id_membership)
        $this->plan = $planSelected->id;
        
        $this->open_editRenew = true;
    }

    public function updateRenew()
    {
        $this->user->memberships()
            ->wherePivot('user_id', $this->user->id)
            ->update([
                'membership_id' => $this->plan,
                // Reemplaza con el nuevo ID de membresía
                'renew_date' => $this->type == 'Semanal' ? now()->nextWeekendDay() :
                                ($this->type == 'Mensual' ? now()->addMonth() : 
                                ($this->type == 'Semestral' ? now()->addMonths(6) :
                                ($this->type == 'Anual' ? now()->addYears(1) : null))),
                'status' => 1,
            ]);
        //Borramos los valores de los inputs
        $this->reset(['open_editRenew']);
        $this->emitTo('users.show-users', 'render');
        $this->emit('alert', 'La membresia se renovó con exito!');
    }

}