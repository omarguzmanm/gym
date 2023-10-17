<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination; //Paginación dinamica

class ShowUsers extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $user, $image, $identifier;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';

    public $type, $plan, $price, $id_membership, $status;
    public $types = [], $plans = [], $prices = [];

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];


    public function mount()
    {
        $this->identifier = rand();
        $this->user = new User();
        $this->types = Membership::pluck('type')->unique();
        $this->plans = collect();
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
   public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $rules = [
        'user.name' => 'required',
        'user.phone_number' => 'required',
        'user.address' => 'required',
        'user.profile_photo_path' => 'required|image|max:2048',
        // 'user.membership' => 'required',
    ];
    public function render()
    {
        $users = User::select('users.*')->join('membership_user', 'users.id', '=', 'membership_user.user_id')
                ->join('memberships', 'membership_user.membership_id', '=', 'memberships.id')
                ->where('users.id', '!=', auth()->id())
                ->where(function ($query) {
                    $query->where('users.name', 'like', '%' . $this->search . '%')
                        ->orWhere('users.code', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        return view('livewire.users.show-users', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        // $this->sort = $sort;
        $this->resetPage(); // Restablece la página a 1 cuando se cambia el ordenamiento.

    }

    public function delete(User $user)
    {
        // Se ocupan las imagenes para este metodo
        Storage::delete([$user->profile_photo_path]);
        $user->delete();
    }
}