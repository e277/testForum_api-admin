<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken($user->name . '_Token')->plainTextToken;

        return response()->json([
            'status' => Response::HTTP_CREATED,
            'token_type' => 'Bearer',
            'user_token' => $token,
            'message' => 'User: ' . $user->name . ' is created'
        ]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken($user->name . '_Token')->plainTextToken;

        return response()->json([
            'status' => Response::HTTP_OK,
            'token_type' => 'Bearer',
            'user_token' => $token,
            'message' => 'User: ' . $user->name . ' is login'
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'user token destroyed',
            // 'status_code' => 204
        ]);
    }
}
