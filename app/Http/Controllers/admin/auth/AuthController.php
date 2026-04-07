<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.layout.auth.login');
    }
    
public function loginProcess(Request $request)
{
    //  Validation
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    //  Credentials + role check
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
        'role' => 'admin' //  important
    ];

    //  Attempt login
if (Auth::guard('admin')->attempt($credentials)) {

    return redirect()->route('admin.dashboard')
        ->with('success', 'Admin login successful.');
}

    //  Fail (wrong credentials OR not admin)
    return redirect()->route('admin.login')
        ->withInput()
        ->with('error', 'Invalid credentials or not authorized.');
}
public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login')
        ->with('success','you are logout successfully');
}
}
