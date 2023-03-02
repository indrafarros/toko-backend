<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login successfully',
            'token' => $user->createToken(env("TOKEN_API"))->plainTextToken
        ], 200);
    }
    public function logout(Request $request)
    {
        $user = $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true
        ], 200);
    }
}
