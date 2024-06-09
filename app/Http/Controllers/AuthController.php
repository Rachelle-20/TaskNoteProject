<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            // Debugging: Check if user is created and has an ID
            if (!$user || !$user->id) {
                return response()->json([
                    'message' => 'User creation failed',
                ], 500);
            }

            // Create a token for the user
            $token = $user->createToken('sanctum-token')->plainTextToken;

        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the user or token',
                'error' => $e->getMessage(),
            ], 500);
        }

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $request)

    {
    
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($request->all())){
            $user = User::where('email',$request->email)->first();
            $token = $user->createToken("API token for{$request->email}")->plainTextToken;

            return response()->json($token);
        }
        return response()->json('Invalid Credentials');
    }

    public function logout(Request $request)

    {
        auth()->user()->tokens()->delete();
        return [
            "message" => 'Logout successfully',
        ];
    }

    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }
}
