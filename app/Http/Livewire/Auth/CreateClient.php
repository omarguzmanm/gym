<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

;

use Livewire\Component;

class CreateClient extends Component
{
    public $code, $email, $password, $password_confirmation;

    protected $rules = [
        'code' => 'required|string|max:6',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => [
            'required',
            'string',
            'min:8',
            // 'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]+$/',
        ],
        'password_confirmation' => 'required|same:password',
    ];
    protected $messages = [
        'code.unique' => 'Este código ya está registrado, por favor inicia sesión.',
        'code.max' => 'El código debe ser de 6 digitos.',
        // 'email.required' => 'El correo no puedes estar vacio.',
        'email.email' => 'El formato del correo no es valido.',
        'password.min' => 'La contraseña debe tener minimo 8 carácteres.',
        // 'password_confirmation' => 'La contraseña no coincide.',

    ];

    public function updated($propertyName)
    {
        // Verificar si el valor del campo es nulo o vacío
        if (empty($this->$propertyName)) {
            // Si está vacío, eliminar el mensaje de validación
            $this->resetValidation($propertyName);
        } else {
            // Si no está vacío, realizar la validación normal
            $this->validateOnly($propertyName);
        }
    }

    public function store()
    {
        $user = User::where('code', $this->code)->first();
        if ($user) {
            $this->validate();
            $user->update([
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
        }else{
            session()->flash('message', 'Verifica los datos e intenta de nuevo');
            return redirect()->back();
        }

        return redirect()->route('login');

    }
    public function render()
    {
        return view('livewire.auth.create-client');
    }
}