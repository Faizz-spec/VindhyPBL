<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    public function register(Request $request) {

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Email is incorrect'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'password is incorrect'
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'jwt-token' => $token,
            'user' => new UserRegisterResource($user),
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout successfully',
        ], 200);
    }
}
