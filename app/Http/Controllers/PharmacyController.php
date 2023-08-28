<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    public function signuppage() {
        return view('pharmacy.pharmacy_signup');
    }

    public function signup(Request $request) {
        $request->validate([
            'pharmacist' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'pharmacy' => 'required',
            'address' => 'required',
            'password' => 'required'
        ],
        [
            'pharmacist.required' => 'Pharmacist name is required',
            'email.required' => 'Email is required',
            'phone_number.required' => 'Phone number is required',
            'pharmacy.required' => 'Pharmacy name is required',
            'address.required' => 'Address is required',
            'password.required' => 'Password is required'
        ]);

        if($request->password != $request->password_confirmation){
            return back()->with('error', 'Password does not match');
        }
        
        $checkEmailOrPharmacy = Pharmacy::where('pharmacy', $request->pharmacy)
                ->orWhere('email', $request->email)->first();
        if($checkEmailOrPharmacy) {
            return back()->with('error', 'Hospital name or email already exist');
        }

        Pharmacy::create([
            'pharmacist' => $request->pharmacist,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'pharmacy' => $request->pharmacy,
            'address' => $request->address,
            'password' => $request->password
        ]);

        return redirect()->route('pharmacy.login');
    }

    public function loginpage() {
        return view('pharmacy.pharmacy_login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $emailOrPharmacy = $request->email;
        $type = filter_var($emailOrPharmacy, FILTER_VALIDATE_EMAIL) ? 'email' : 'pharmacy';
        $credentials = [$type => $emailOrPharmacy, 'password' => $request->password];
        if(Auth::guard('pharmacy')->attempt($credentials)){
            return redirect()->route('pharmacy.home');
        } else {
            return back()->with('error', 'Invalid username or password');
        }
    }

    public function home() {
        return view('pharmacy.pharmacy_home');
    }

    public function logout(Request $request) {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        return redirect()->route('doctor.login');
    }    
}
