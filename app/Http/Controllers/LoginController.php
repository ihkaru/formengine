<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Supports\Constants;
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
    if(!$payload) return response()->json(['message' => 'Google credential is already expired'], 401);
    if($request->input('email') != $payload['email']) return response()->json(['message' => 'Invalid email'], 401);
    $user = User::where('email',$request->input('email'))->first();
    if (!$user) {
        $user = User::create([
            'name'=>$payload['name'],
            'email'=>$payload['email'],
            'password'=>Hash::make($payload['email']),
            'jenis'=>Constants::JENIS_USER_NON_ORGANIK
        ]);

    }
    $token = $user->createToken('auth-token', ['*'],now()->addMonth());
    return response()->json([
        'access_token' => $token->plainTextToken,
        'token_type' => 'Bearer',
        'expires_at'=>$token->accessToken->expires_at
    ]);

    // return response()->json(['message' => 'Invalid credentials'], 401);
}
}
