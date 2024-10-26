<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer; // Make sure to import your model

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:customers',
            'gender' => 'required|string',
            'contact_no' => 'required|string|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'pincode' => 'required|string|max:10',
        ]);

        // Create a unique user ID
        $userId = 'i' . random_int(100000, 999999);

        // Insert the data into the database
        Customer::create([
            'user_id' => $userId,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'gender' => $request->gender,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
            'country' => $request->country,
            'state' => $request->state,
            'district' => $request->district,
            'address' => $request->address,
            'pincode' => $request->pincode,
        ]);

        return redirect()->route('user.register.form')->with('success', 'Registration successful!');
    }
    public function login(Request $request)
{
    $request->validate([
        'user_id' => 'required|string',
        'password' => 'required|string',
    ]);

    if (auth()->attempt(['user_id' => $request->user_id, 'password' => $request->password])) {
        // Login successful
        return redirect()->route('home'); // Redirect to home or dashboard
    }

    return back()->withErrors([
        'user_id' => 'The provided credentials do not match our records.',
    ]);
}
}
