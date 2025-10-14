<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehical;
use App\Models\Vehicle;

class AuthController extends Controller
{
    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'redirect' => route('rederectDashbord'),
                'message' => 'Login successful!',
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials!'], 401);
        }
    }

    public function rederectDashbord()
    {
        $userid = Auth::user()->id;

        // Get Log id 
        $user = User::where('id', $userid)->first();
        echo $logid =  $user->logid;

        $destinations = Destination::with('firstImage')->get();

        return view('frontend.index', compact('destinations'));
    }
}
