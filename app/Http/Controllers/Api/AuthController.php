<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        // Recruiter registration
    public function registerRecruiter(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'companyName' => 'required|string',
            'companyLocation' => 'required|string',
            'ficheTechnique' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:10240',
        ]);

        $name = $fields['firstName'] . ' ' . $fields['lastName'];
        $role = 'recruiter';

        $path = $request->file('ficheTechnique')->store('fiche_technique', 'public');

        $user = User::create([
            'name' => $name,
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'role' => $role
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'company_name' => $fields['companyName'],
            'company_location' => $fields['companyLocation'],
            'fiche_technique_path' => $path,
            'token' => $token
        ];

        return response($response, 201);
    }

    // Recruiter login
    public function loginRecruiter(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->where('role', 'recruiter')->first();

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

    public function register(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);

        // Combine firstName and lastName for the name field
        $name = $fields['firstName'] . ' ' . $fields['lastName'];
        // Default role to 'applicant'
        $role = 'applicant';

        $user = User::create([
            'name' => $name,
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'role' => $role
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
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
        $request->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ], 200);
    }
}