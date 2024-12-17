<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller{
    public function showRegisterForm(){
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
    }

    public function showLoginForm(){
        return view('loginAndRegister');
    }

    public function login(Request $request){
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);

        if($validate->fails()){
            return response(['message' => $validate->errors()->first()], 400);
        }

        if($loginData['email'] === 'admin@gmail.com' && $loginData['password'] === 'admin123'){
            $adminToken = 'admin-special-token';

            return response([
                'message' => 'Admin Authenticated',
                'redirect' => '/dashboard',
                'token_type' => 'Bearer',
                'access_token' => $adminToken
            ]);
        }

        if(!Auth::attempt($loginData)){
            return response(['message' => 'Invalid email & password match'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->plainTextToken;

        return response([
            'message' => 'Authenticated',
            'redirect' => '/Home',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }

    public function showProfile(Request $request){
        $user = Auth::user();

        if(!$user){
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        
        return response()->json([
            'nama' => $user->nama,
            'no_telp' => $user->no_telp,
            'email' => $user->email,
            'alamat' => $user->alamat,
        ], 200);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'address' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->nama = $request->input('username');
        $user->no_telp = $request->input('phone');
        $user->email = $request->input('email');
        $user->alamat = $request->input('address');
        $user->save();
        
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }

    public function updateProfilePicture(Request $request){
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if($request->hasFile('profile_picture')){
            $uploadFolder = 'user';
            $image = $request->file('profile_picture');

            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $uploadedImageResponse = basename($image_uploaded_path);

            if($user->profile_picture){
                Storage::disk('public')->delete('user/' . $user->profile_picture);
            }

            $user->profile_picture = $uploadedImageResponse;
            $user->save();

            return response([
                'message' => 'User Profile Updated Successfully!',
                'data' => $user,
            ], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

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