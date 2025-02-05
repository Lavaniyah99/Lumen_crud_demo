<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Check if request is GET or POST
        if ($request->isMethod('get')) {
            return response()->json(['message' => 'GET request received for registration']);
        }

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(['message' => 'GET request received for login']);
        }

        return response()->json(['message' => 'Login successful']);
    }

    public function getUser()
    {
        return response()->json(['user' => 'User details here']);
    }
}
