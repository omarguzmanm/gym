<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Membership;
use Livewire\Component;

class AdminMemberships extends Component
{

    public $type, $plan, $price, $oldPrice, $oldPlan;
    public $types = [], $plans = [], $prices = [];
    public $open_edit = false;
    protected $listeners = ['membershipAdded' => 'render'];
    protected $rules = [
        // 'type' => 'required',
        // 'plan' => 'required',
        'price' => 'required',
    ];

    public function mount()
    {
        // $this->types = Membership::pluck('type')->unique();
        $this->plans = collect();
    }
    public function updatedType($value)
    {
        $this->plans = Membership::where('type', $value)->get();
        $this->oldPlan = $this->plans->first()->plan ?? null;
        $this->plan = $this->plans->first()->id ?? null;
        $this->price = $this->plans->first()->price ?? null;
    }

    public function updatedPlan($value)
    {
        $this->prices = Membership::where('id', $value)->get();
        $this->price = $this->prices->first()->price ?? null;
        $this->oldPlan = $this->prices->first()->plan ?? null;
    }

    public function edit($price)
    {
        // $this->membership = $membership;
        $this->oldPrice = $this->price;
        $this->price = $price;
        $this->open_edit = true;
    }

    public function update()
    {
        // $this->validate();
        // $this->membership->save();
        // dd($this->oldPrice, $this->price);
        $price = Membership::where('price', $this->oldPrice)->first();
        $price->update([
            // 'type' => $this->type,
            // 'plan' => $this->plan,
            'price' => $this->price,
        ]);

        //Borramos los valores de los inputs
        $this->reset(['open_edit']);

        $this->emit('alert', 'El precio se actualizó satisfactoriamente');
    }


    public function render()
    {
        $this->types = Membership::pluck('type')->unique();
        return view('livewire.memberships.admin-memberships');
    }

}