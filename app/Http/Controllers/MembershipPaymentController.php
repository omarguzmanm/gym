<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MembershipPaymentController extends Controller
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
            'profile_photo_path' => 'https://res.cloudinary.com/des5tlbfo/image/upload/v1701389226/gym/users/wdfx4ceethhvb9pffv3s.jpg'
        ]);

        $user->assignRole('Cliente');

        // Membresia y usuario codificados (URL)
        $priceEncode = $request->priceDecode;
        $userEncode = $user->id;
        $hashId = new Hashids('', 20);
        $priceEncode = $hashId->encode($priceEncode);
        $userEncode = $hashId->encode($userEncode);

        // dd($priceEncode, $userEncode);

        return redirect()->route('payment-guest', [$priceEncode, $userEncode]);
    }

    public function selectMembership()
    {
        $premiumMonthPrice = 799;
        $classicMonthPrice = 499;
        $weekPrice = 199;
        $hashId = new Hashids('', 20);
        $userEncode = Auth()->id();
        $premiumMonthPrice = $hashId->encode($premiumMonthPrice);
        $classicMonthPrice = $hashId->encode($classicMonthPrice);
        $weekPrice = $hashId->encode($weekPrice);
        $userEncode = $hashId->encode($userEncode);
        return view('checkout.memberships', compact('premiumMonthPrice', 'classicMonthPrice', 'weekPrice', 'userEncode'));
    }

    public function paymentAuth(Request $request)
    {
        $hashId = new Hashids('', 20);
        $priceDecode = $hashId->decode($request->precio);
        $userDecode = $hashId->decode($request->usuario);
        $user = User::where('id', $userDecode)->first();
        $membership = Membership::where('price', $priceDecode)->first();
        return view('checkout.payment-auth', compact('membership', 'user'));
    }

}
