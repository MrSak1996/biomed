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
                'client_id' => $user->client_id
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ]);
        }
    }

    public function getUsers(Request $request)
    {
        $api_token = $request->query('api_token');

        try {
            // Start building the query
            $data = DB::table('users as u')
                ->leftJoin('tbl_client as c', 'c.id', '=', 'u.id')
                ->leftJoin('tbl_department as d', 'd.id', '=', 'c.department_id')
                ->select(
                    'c.control_no as code',
                    'd.department',
                    'u.name',
                    'u.api_token',
                    'c.address',
                    'c.city_province',
                    'u.role'
                )
                ->get();


            // Conditionally add the where clause
            if ($api_token) {
                $data->where('u.api_token', $api_token);
            }

            // Execute the query

            // Return the results as JSON
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'status' => false,
                'message' => 'Failed to fetch users.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function logout()
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $user->tokens()->delete(); // Invalidate all user tokens
        }

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
