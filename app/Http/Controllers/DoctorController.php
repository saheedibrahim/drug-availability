<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function signupPage() {
        return view('doctor.doctor_signup');
    }

    public function saveToDB($model, $DBdatas, $DBValues) {
        foreach($DBdatas as $data){
            $model::create([$data => $DBValues]);
        }
    }

    public function signup(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'hospital' => 'required',
            'address' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone_number.required' => 'Phone Number is required' ,
            'hospital.required' => 'Hospital name is required',
            'address.required' => 'Address is required',
            'password.required' => 'Password is required'
        ]
    );

        if($request->password != $request->confirm_password){
            return back()->with('error', 'Password does not match');
        }
        
        $checkEmail = Doctor::where('hospital', $request->hospital)
                    ->orWhere('email', $request->email) ->first();
        if($checkEmail) {
            return back()->with('error', 'Hospital name or Email already exist');
        }
        
        // $DBdatas = ['name','email', 'phone_number', 'hospital', 'address', 'password'];


        // $this->saveToDB(Doctor::class, $DBdatas[0], $request->all());



        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'hospital' => $request->hospital,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        return redirect()->route('doctor.login');
    }

    public function loginPage() {
        return view('doctor.doctor_login');
    }

    public function login(Request $request) {
        $login = $request->email;
        $emailOrHospital = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'hospital';
        $credentials = [$emailOrHospital => $login, 'password' => $request->password];
        if(Auth::guard('doctor')->attempt($credentials)){
                return redirect()->route('doctor.home');
        } else {
                return back()->with('error', 'Invalid username or password');
            }
    }

    public function home() {
        return view('doctor.doctor_home');
    }

    public function logout(Request $request) {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        return redirect()->route('doctor.login');
    }
}
