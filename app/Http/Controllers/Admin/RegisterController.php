<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['status' => true, 'data' => $user, 'message' => 'User has been created']);
    }
}
