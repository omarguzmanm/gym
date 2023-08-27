<?php

namespace App\Http\Livewire;

use App\Models\Membership;
use Livewire\Component;
use App\Models\User;
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
    public $readyToLoad = false;
    public $open_edit = false;
    public $open_editRenew = false;
    public $type, $plan, $price, $id_membership;
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
        // 'user.membership' => 'required',
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $users = User::with('memberships')->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('inscription', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        } else {
            $users = [];
        }
        return view('livewire.show-users', compact('users'));
    }

    public function loadUser()
    {
        $this->readyToLoad = true;
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

        $this->sort = $sort;
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
            Storage::delete([$this->user->image]);
            $this->user->image = $this->image->store('users');
        }

        $this->user->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);

        $this->identifier = rand();

        $this->emit('alert', 'El usuario se actualizó satisfactoriamente');
    }

    public function delete(User $user)
    {
        // Se ocupan las imagenes para este metodo
        // Storage::delete([$user->image]);

        $user->delete();
    }

    public function editRenew(User $user)
    {
        $this->user = $user;
        $this->user->load('memberships'); // Carga las relaciones nuevamente
        // dd($user->memberships->pluck('plan'));
        $this->type = $user->memberships->pluck('type');
        $this->plans = Membership::where('type', $this->type)->get();
        $this->price = $user->memberships->pluck('price');
        $this->open_editRenew = true;
    }

    public function updateRenew()
    {
        // dd($this->user->id);
        $this->user->memberships()
            ->wherePivot('user_id', $this->user->id)
            ->update([
                'membership_id' => $this->id_membership,
                // Reemplaza con el nuevo ID de membresía
                'status' => 1,
                'renew_date' => now(),
            ]);
        //Borramos los valores de los inputs
        $this->reset(['open_editRenew']);

        $this->emit('alert', 'La membresia se renovó con exito!');
    }


}