<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {

        $user = User::where('code', $request->code)->first();

        $rules = [
            'code' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => $this->passwordRules(),
        ];
        $messages = [];

        $request->validate($rules, $messages);

        $user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }


}