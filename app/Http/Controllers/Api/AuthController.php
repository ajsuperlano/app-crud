<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response(['Errors' => $validator->errors()], 404);
        }


        if (auth()->attempt($request->all())) {
            $user = auth()->user();
            $access_token = 'Bearer '. $user->createToken('authToken')->accessToken;

            return response([
                'user' => $user,
                'access_token' => $access_token
            ], Response::HTTP_OK);
        }

        return response([
            'message' => 'This User does not exist'
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response(['Errors' => $validator->errors()], 404);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response($user, Response::HTTP_CREATED);
    }

    public function logout(Request $request)
    {
        // if (Auth::check()) {
        //     Auth::user()->token()->revoke();
        //     return response()->json(['success' =>'logout_success'],200);
        // }else{
        //     return response()->json(['error' =>'api.something_went_wrong'], 500);
        // }
        // dd($request->header(), "logout");

        $request->user()->token()->revoke();
        return response()->json(['message' =>
        'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
