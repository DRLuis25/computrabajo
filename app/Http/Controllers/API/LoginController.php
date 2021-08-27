<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Usuario y/o contraseña incorrecto.'
            ],401);
        }
        $tokenResult = Auth::user()->createToken('aBJg4OWQxqoLwXAhhci2Ov03G4alTBJbbgF6GGDy');
        /*
        Validar el remember_me
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();*/

        return response([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' => Auth::user(),
            //'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.'
        ]);

    }
}
