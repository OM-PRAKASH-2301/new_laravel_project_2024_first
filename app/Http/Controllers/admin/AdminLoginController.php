<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Import the Admin model
use Illuminate\Support\Facades\Hash; // Import Hash for password hashing

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    
    public function showRegisterForm()
    {
        return view('admin.register'); // Ensure you have this Blade file
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = new Admin();
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Hash the password
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Admin created successfully. You can now log in.');
    }
}


