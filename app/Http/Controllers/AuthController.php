<?php

namespace App\Http\Controllers;

use App\Models\User; // Import User model
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|unique:users,phone_number|max:15',
        'email' => 'required|string|email|max:255|unique:users,email', // Add email validation
        'password' => 'required|string|min:8',
    ]);

    $validated['password'] = bcrypt($validated['password']);

    $user = User::create($validated);

    // Optionally, you can return a view or redirect after registration
    return redirect()->route('login')->with('success', 'Registration successful, please log in.');
}




    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if (!$user->is_verified) {
            return response()->json(['message' => 'Account not verified'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'verification_code' => 'required|integer',
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if ($user && $user->verification_code == $request->verification_code) {
            $user->is_verified = true;
            $user->save();

            return response()->json(['message' => 'Account verified'], 200);
        }

        return response()->json(['message' => 'Invalid verification code'], 400);
    }

    public function showRegisterForm()
    {
        return view('register'); // Ensure this view exists
    }

    public function showLoginForm()
    {
        return view('login'); // Return the login view
    }

    public function showVerifyCodeForm()
    {
        return view('verifyCode'); // Return the verification code view
    }
    public function showUsers()
{
    $users = User::all(); // Retrieve all users from the database
    return view('users', compact('users')); // Pass users data to the view
}
}
