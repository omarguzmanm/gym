<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Barryvdh\DomPDF\Facade\Pdf;


class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;

    public $user_type, $name, $phone_number, $address, $membership, $image, $identifier;

    public function mount()
    {
        $this->identifier = rand();
         // Propiedades que deseas inicializar con la opción predeterminada 'selecciona'
         $defaultProperties = ['user_type', 'membership'];

        foreach ($defaultProperties as $property) {
            $this->{$property} = $this->{$property} ?? 'selecciona';
        }
    }

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'membership' => 'required',
        // 'image'             => 'required|image|max:2048'
    ];

    public function save()
    {
        // $this->validate();
        // dd($this->name);

        // $image = $this->image->store('users');


        $user = User::create([
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'membership' => $this->membership,
            // 'image'     =>  $image
        ]);

        $role = Role::where('name', $this->user_type)->first();
        $user->assignRole($role);

        //Borramos los valores de los inputs
        $this->reset(['open', 'name', 'phone_number', 'address', 'image']);

        $this->identifier = rand();

        // Emitimos un evento
        // $this->emit('render');
        $this->emitTo('show-users', 'render');

        $this->emit('alert', 'El usuario se creó satisfactoriamente');

        if ($this->user_type == 'usuario') {
            return redirect()->route('ticket', $user->id);
        }

    }


    public function ticketUser($id)
    {
        $codigoQR = QrCode::size(100)->generate('http://127.0.0.1:8000/newUser');
        $codigoQRBase64 = 'data:image/png;base64,' . base64_encode($codigoQR);
        $users = User::where('id', $id)->get();        
        $ticket = Pdf::loadView('reports.ticket-user', compact('users', 'codigoQRBase64'));
        $ticket->setPaper('a6', 'portrait');

        return $ticket->stream('Ticket.pdf');
    }


    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'phone_number', 'address', 'image']);
            $this->identifier = rand();
            $this->emit('resetCKEditor');

        }
    }


    public function render()
    {
        return view('livewire.create-user');
    }
}