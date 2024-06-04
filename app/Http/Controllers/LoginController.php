<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        $user = User::where('username', $request->input('username'))
        ->where('password',  $request->input('password'))
        ->first();
      
        if ($user) {
            $token = $user->createToken('auth-token')->plainTextToken;
            User::where('id', $user->id)
            ->update([
                'api_token' => $token
            ]);
            return response()->json(['token' => $token]);
        }

        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
        ]);
    }
}
