<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials',
                'data' => $validate->messages(),
            ], 422);
        }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
        ], 401);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
        ], 401);
    }

    // Create a token for the authenticated teacher
    $token = $user->createToken('Authtoken', [$user->role])->plainTextToken;

    // Return success response with teacher info and token
    return response()->json([
        'success' => true,
        'message' => 'Login successful.',
        'ability' => $user->role,
        'token' => $token,
        'user' => $user,
    ], 200);
    
    }

    public function logout(Request $request)
    {
        // Revoke the current user's token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful.',
        ], 200);
    }
    
}
