<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        #validations
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone' => 'required|string',
        ]);

        #create user
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone'],
        ]);


        #send feedback to user if successful
        $response = [
            'Message' => 'Registration Successful, Please login to have access tokens',
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        #validation
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        # Check email
        $user = User::where('email', $fields['email'])->first();

        # Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(
                [
                    'message' => 'Bad credentials',
                ],
                401
            );
        }

        # create token 
        $token = $user->createToken('myapptoken')->plainTextToken;

        # send response to user after successful login
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
