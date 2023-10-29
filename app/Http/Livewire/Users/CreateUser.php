<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Membership;
use App\Models\User;
use Livewire\WithFileUploads;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Barryvdh\DomPDF\Facade\Pdf;


class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;

    public $user_type, $name, $phone_number, $address, $image, $identifier;
    public $type, $plan, $price, $id_membership;
    public $types = [], $plans = [], $prices = [];

    public function mount()
    {
        $this->identifier = rand();
        // Propiedades que deseas inicializar con la opción predeterminada 'selecciona'
        // $defaultProperties = ['user_type', 'type', 'plan'];

        // foreach ($defaultProperties as $property) {
        //     $this->{$property} = $this->{$property} ?? 'selecciona';
        // }
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

    protected $rules = [
        // 'user_type' => 'required',
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'image' => 'required|image|max:2048',
        'type' => 'required',
        'plan' => 'required',
        // 'price' => 'required',
    ];

    public function save()
    {
        $this->validate();
        // dd($this->id_membership);

        $image = $this->image->store('users');
        $user = User::create([
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'code' => random_int(1000, 9999),
            'profile_photo_path' => $image
        ]);

        $user->memberships()->attach($this->id_membership, [
            'inscription' => now(),
            'renew_date' => $this->type == 'Semanal' ? now()->nextWeekendDay() :
                            ($this->type == 'Mensual' ? now()->addMonth() :
                            ($this->type == 'Semestral' ? now()->addMonths(6) :
                            ($this->type == 'Anual' ? now()->addYears(1) : null))),
            'status' => 1
        ]);

        $role = Role::where('name', $this->user_type)->first();
        $user->assignRole($role);

        //Borramos los valores de los inputs
        $this->reset(['open', 'user_type', 'name', 'phone_number', 'address', 'image', 'type', 'plan', 'price']);

        $this->identifier = rand();

        // Emitimos un evento
        // $this->emit('render');
        $this->emitTo('users.show-users', 'render');

        $this->emit('alert', 'El usuario se creó satisfactoriamente');

        // if ($this->user_type == 'usuario') {
        //     return redirect()->route('ticket', $user->id);
        // }

    }


    public function ticketUser($id)
    {
        $codigoQR = QrCode::size(100)->generate('http://127.0.0.1:8000/nuevo-usuario');
        $codigoQRBase64 = 'data:image/png;base64,' . base64_encode($codigoQR);
        $user = User::with('memberships')->where('id', $id)->first();
        // dd($user);
        $ticket = Pdf::loadView('reports.ticket-user', compact('user', 'codigoQRBase64'));
        $ticket->setPaper('a6', 'portrait');

        return $ticket->stream('Ticket.pdf');
    }


    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'phone_number', 'address', 'image']);
            $this->identifier = rand();
            // $this->emit('resetCKEditor');
            $this->resetValidation();
        }
    }


    public function render()
    {
        return view('livewire.users.create-user');
    }
}
