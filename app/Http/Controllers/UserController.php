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

        return redirect()->route('loginAndRegister')->with('success', 'Registrasi berhasil!');
    }

    public function showLoginForm()
    {
        return view('login'); // Halaman login, sesuaikan dengan view Anda
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

        if(!Auth::attempt($loginData)){
            return response(['message' => 'Invalid email & password match'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;

        return redirect()->route('/Home')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response([
            'message' => 'Logged out'
        ]);
    }
}