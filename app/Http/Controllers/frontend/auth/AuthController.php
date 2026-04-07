<?php

namespace App\Http\Controllers\frontend\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    // only visible page 
    public function register()
    {
        return view('frontend.layout.auth.register');
    }
    // only visible page 
    public function login()
    {
        return view('frontend.layout.auth.login');
    }

    // user create 
    public function registerProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        //  if validation fail
        if ($validator->fails()) {
            return redirect()->route('register')
                ->withInput()
                ->withErrors($validator);
        }

        try {
            //  Save user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            //  Success redirect
            return redirect()->route('login')
                ->with('success', 'Registration successful, please login.');
        } catch (\Exception $e) {

            //  if unexpected error 
            return redirect()->route('register')
                ->withInput()
                ->with('error', 'Something went wrong, try again.');
        }
    }

    // user login 
    public function loginProcess(Request $request)
    {
        //  Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //  Auth check
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')
                ->with('success', 'Login successful.');
        }

        //  Wrong credentials
        return redirect()->back()
            ->withInput()
            ->with('error', 'Invalid email or password.');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','you are logout successfully');
    }
}
