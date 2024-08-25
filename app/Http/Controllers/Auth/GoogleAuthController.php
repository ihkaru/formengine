<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
        header('Access-Control-Allow-Origin: *');
        return Socialite::driver('google')->redirect()->withHeaders(
           [
                "Access-Control-Allow-Methods"=>'GET, POST, PATCH, PUT, DELETE, OPTIONS',
                "Access-Control-Allow-Headers"=>'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length',
                "Access-Control-Allow-Origin"=>'*'
           ]
        );
    }

    public function handleGoogleCallback()
    {
        dump('test');
        try {
            $user = Socialite::driver('google')->user();
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                $token = $existingUser->createToken('auth_token')->plainTextToken;
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('dummy-password') // You might want to handle this differently
                ]);
                $token = $newUser->createToken('auth_token')->plainTextToken;
            }

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong loh'], 500);
        }
    }
}
