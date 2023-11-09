<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipPayment extends Controller
{
    public function index(Request $request)
    {   
        $membership = Membership::where('price', $request->precio)->first();
        return view('checkout.payment', compact('membership'));
    }
}
