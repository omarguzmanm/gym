<?php

namespace App\Http\Livewire\Memberships;

use App\Models\Membership;
use Livewire\Component;
use Livewire\WithPagination; //Paginación dinamica

class AdminMemberships extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $memberships = Membership::where('type', 'like', '%' . $this->search . '%')->orderBy('id', 'asc')->paginate(10);
        return view('livewire.memberships.admin-memberships', compact('memberships'));
    }

    public function delete(Membership $membership)
    {
        $membership->delete();
    }

}