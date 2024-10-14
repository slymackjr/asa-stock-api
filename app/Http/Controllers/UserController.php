<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            $role = $user->role; // Assuming 'role' is a field in your users table

            // Create token with abilities
            $token = $user->createToken('authToken', [$role])->plainTextToken;
            $token = $user->createToken('authToken')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials',
            ], 401);
        }
    }
    
}
