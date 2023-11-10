<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembershipPayment extends Controller
{
    public function payment(Request $request)
    {
        $hashId = new Hashids('', 20);
        $priceDecode = $hashId->decode($request->precio);
        $userDecode = $hashId->decode($request->usuario);
        $user = User::where('id', $userDecode)->first();
        $membership = Membership::where('price', $priceDecode)->first();
        return view('checkout.payment', compact('membership', 'user'));
    }

    public function checkoutForm(Request $request)
    {
        $hashids = new Hashids('', 40);
        $priceDecode = $hashids->decode($request->precio);
        $membership = Membership::where('price', $priceDecode)->first();
        return view('checkout.check-account', compact('membership', 'priceDecode'));
    }

    public function checkoutSave(Request $request)
    {
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
        // Membresia y usuario codificados (URL)
        $priceEncode = $request->priceDecode;
        $userEncode = $user->id;
        $hashId = new Hashids('', 20);
        $priceEncode = $hashId->encode($priceEncode);
        $userEncode = $hashId->encode($userEncode);

        // dd($priceEncode, $userEncode);

        return redirect()->route('payment', [$priceEncode, $userEncode]);
    }


}
