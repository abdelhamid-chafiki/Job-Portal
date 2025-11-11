<?php

namespace App\Http\Controllers\Api; // <-- هادا هو السطر لي تصلح

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // <-- تأكد هادي كاينة
use Illuminate\Support\Facades\Hash; // <-- تأكد هادي كاينة

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email', 
            'password' => 'required|string|confirmed', 
            'role' => 'required|in:applicant,recruiter' 
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => $fields['password'],
            'role' => $fields['role']
        ]);

        
        $token = $user->createToken('myapptoken')->plainTextToken;

       
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); 
    }

   
    public function login(Request $request)
    {
        
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Email or password incorrect'
            ], 401); 
        }

        
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200); 
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete(); 

        return [
            'message' => 'Logged out'
        ];
    }
}