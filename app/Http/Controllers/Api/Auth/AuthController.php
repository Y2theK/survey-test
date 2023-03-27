<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // validate inputs
        $validated_data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);
        $validated_data['password'] = bcrypt($request->password);

        //create user
        $user = User::create($validated_data);

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'token-type' => 'Bearer'
        ], 201);
    }
    public function login(Request $request)
    {
        $validated_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validated_data)) {
            return response()->json(['message' => 'Invalid email or password'], 422);
        }

        $user = Auth::user();

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'token-type' => 'Bearer'
        ], 200);
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User loggout ',
        ], 200);
    }
}
