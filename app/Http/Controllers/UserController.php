<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller{
    public function register(Request $request){
        $registrationData = $request->all();

        $validate = Validator::make($registrationData, [
            'nama' => 'required|max:60',
            'email' => 'required|email:rfc,dns|unique:user',
            'password' => 'required|min:8',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()->first()], 400);
        }

        $registrationData['password'] = bcrypt($request->password);

        $user = User::create($registrationData);

        return response([
            'message' => 'Register Success',
            'user' => $user
        ], 200);
    }

    public function login(Request $request){
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);
        if($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response(['message' => 'Invalid email & password match'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response([
            'message' => 'Logged out'
        ]);
    }

    public function getAllUsers()
    {
        $users = User::all(['id', 'nama', 'email', 'alamat', 'no_telp']);
        return response([
            'message' => 'User list retrieved successfully',
            'users' => $users
        ], 200);
    }

    public function index()
    {
         $users = User::all(); 
        return view('dashboard', compact('users'));
    }
    
    public function getTotalUsers()
    {
        try {
            $totalUsers = User::count();
            return response()->json([
                'message' => 'Total users retrieved successfully',
                'totalUsers' => $totalUsers
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        $user->delete();
    
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
    

}