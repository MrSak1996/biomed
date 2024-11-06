<?php
namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens; // Import HasApiTokens trait
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Retrieve the user by username
        $user = User::where('username', $request->input('username'))->first();
        // Check if user exists and verify the password
        // if ($user && Hash::check($request->password, $user->password)) {
            if ($user && $request->input('password') === $user->password) {

        // Create an API token
            $token = $user->createToken('auth-token')->plainTextToken;

            // Update the user with the new token if needed (but typically not necessary)
            $user->update([
                'api_token' => $token
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'api_token' => $token,
                'user_role' => $user->role,
                'userId' => $user->id,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ]);
        }
    }

}
