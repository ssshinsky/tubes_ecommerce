<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller{
    public function showRegisterForm()
    {
        return view('loginAndRegister'); 
    }
    public function register(Request $request){
        $registrationData = $request->all();

        $validate = Validator::make($registrationData, [
            'nama' => 'required|max:60',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()->first()], 400);
        }

        $registrationData['password'] = bcrypt($request->password);

        $users = User::create($registrationData);

        return response([
            'message' => 'Register Success',
            'user' => $users
        ], 200);
        
        // return response()->json([
        //     'message' => 'Registration successful!',
        //     'user' => $user
        // ], 201);
    }

    public function showLoginForm()
    {
        return view('login'); // Halaman login, sesuaikan dengan view Anda
    }
    public function login(Request $request){
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);
    
        if (!Auth::attempt($loginData)) {
            return response()->json(['message' => 'Invalid credentials provided'], 401);
        }
    
        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->plainTextToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }
}