<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'national_id' => $request->national_id,
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'role' => $request->role,
            'date_of_birth' => $request->date_of_birth,
            'tickets' => $request->tickets
        ]);
        return response()->json(['msg' => "registered successfully", $user], 200);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user])->cookie('jwt', $token, 60 * 24);
    }

    public function logout(Request $request)
    {
        $data = $request->user();
        $data->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
