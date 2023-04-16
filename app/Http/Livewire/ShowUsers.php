<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;    //Paginación dinamica

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

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant'              =>          ['except' => '10'],
        'sort'              =>          ['except' => 'id'],
        'direction'         =>          ['except' => 'desc'],
        'search'            =>          ['except' =>  '']
    ];

    public function mount(){
        $this->identifier = rand();
        $this->user = new User(); 
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'user.name'    => 'required',
        'user.phone_number'  => 'required'
    ];

    public function render()
    {
        if($this->readyToLoad){
            $users = User::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        }else{
            $users = [];
        }
        return view('livewire.show-users', compact('users'));
    }
    
    public function loadUser(){
        $this->readyToLoad =  true;
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

    public function edit(User $user){
        $this->user = $user;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();

        if($this->image){
            Storage::delete([$this->user->image]);
            $this->user->image = $this->image->store('users');
        }

        $this->user->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);

        $this->identifier = rand();

        $this->emit('alert', 'El post se actualizó satisfactoriamente');
    }

    public function delete(User $user){
        Storage::delete([$user->image]);

        $user->delete();
    }
}
