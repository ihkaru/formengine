<?php

namespace App\Http\Controllers;

use App\Models\User;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
        'credentials' => 'required',
    ]);

    $idToken = $request->input('credentials');
    $client = new Google_Client(['client_id' => config('services.google.client_id')]);
    $payload = $client->verifyIdToken($idToken);
    // dd($payload);

    if($request->input('email') != $payload['email']) return response()->json(['message' => 'Invalid email'], 401);
    $user = User::where('email',$request->input('email'))->first();
    if (!$user) {
        $user = User::create([
            'name'=>$payload['name'],
            'email'=>$payload['email'],
            'password'=>Hash::make($payload['email'])
        ]);

    }
    $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

    return response()->json(['message' => 'Invalid credentials'], 401);
}
}
