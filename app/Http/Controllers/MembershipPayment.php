<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembershipPayment extends Controller
{
    public function payment(Request $request)
    {
        $user = User::find($request->usuario);
        $membership = Membership::where('price', $request->precio)->first();
        return view('checkout.payment', compact('membership', 'user'));
    }

    public function checkoutForm(Request $request)
    {
        $price = $request->precio;
        $membership = Membership::where('price', $price)->first();
        return view('checkout.check-account', compact('membership', 'price'));
    }

    public function checkoutSave(Request $request)
    {
        //Membresia seleccionada
        $price = $request->price;
        // Validaciones
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|string|min:8',
        ]);
        // Creamos usuario
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('payment', [$price, $user->id]);
    }


}
