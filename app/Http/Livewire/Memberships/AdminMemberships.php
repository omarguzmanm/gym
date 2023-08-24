<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Membership;
use Livewire\Component;

class AdminMemberships extends Component
{

    public $type, $plan, $price;
    public $types = [], $plans = [], $prices = [];

    public function mount()
    {
        $this->types = Membership::pluck('type')->unique();
        $this->plans = collect();
    }
    public function updatedType($value)
    {
        $this->plans = Membership::where('type', $value)->get();
        $this->plan = $this->plans->first()->id ?? null;
        $this->price = $this->plans->first()->price ?? null;
    }

    public function updatedPlan($value)
    {
        $this->prices = Membership::where('id', $value)->get();
        $this->price = $this->prices->first()->price ?? null;
    }


    public function render()
    {

        return view('livewire.memberships.admin-memberships');
    }

}