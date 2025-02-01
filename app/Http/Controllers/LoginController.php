<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
    
        if ($token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Login bem-sucedido!',
                'token' => $token
            ]);
        }
    
        return response()->json([
            'message' => 'Credenciais inválidas!'
        ], 401);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'Logout bem-sucedido!'
        ]);
    }
    
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }
    
}
