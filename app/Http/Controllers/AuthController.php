<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // For demo purposes, if it's "admin@deeptree.in" and "password", let's create it if it doesn't exist
        if ($request->email === 'admin@deeptree.in' && $request->password === 'password') {
            if (!$user) {
                $user = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@deeptree.in',
                    'password' => Hash::make('password')
                ]);
            }
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken('admin-token')->plainTextToken,
            'user' => $user
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Current password is incorrect',
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        // Optionally revoke all other tokens or the current token
        // $user->tokens()->delete();

        return response()->json([
            'message' => 'Password changed successfully'
        ]);
    }
}
