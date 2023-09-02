<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\Rule;;

use Livewire\Component;

class CreateClient extends Component
{
    public $code, $email, $password, $password_confirmation;

    protected $rules = [
        'code' => 'required|string|unique:users|max:6',
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
        'code.max' => 'El código debe ser de 6 digitos.',
        'email.required' => 'El correo no puedes estar vacio.',
        'email.email' => 'El formato del correo no es valido.',
        
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {

        $validatedData = $this->validate();


    }
    public function render()
    {
        return view('livewire.auth.create-client');
    }
}