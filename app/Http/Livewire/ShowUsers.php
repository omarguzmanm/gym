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
        // 'user.membership' => 'required',
    ];

    public function render()
    {
        // if ($this->readyToLoad) {
            $users = User::with('memberships')->where('id', '!=', auth()->id())->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        // } else {
        //     $users = [];
        // }
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

        $this->emit('alert', 'La membresia se renovó con exito!');
    }


}