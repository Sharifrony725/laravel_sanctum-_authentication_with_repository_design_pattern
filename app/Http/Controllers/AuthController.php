<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repository\Product\sendSuccessResponse;
class AuthController extends Controller
{
    public function register(Request $request)
    {
       // $data = $request->validated();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request['password']);
        $user = User::create($data);
        $success['token'] =  $user->createToken('SanctumAPI')->plainTextToken;
        $success['name'] =  $user->name;

        return sendSuccessResponse($success, 'User register successfully.',201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('SanctumAPI')->plainTextToken;
            $success['name'] =  $user->name;

            return sendSuccessResponse($success, 'User login successfully.');
        } else {
            return sendErrorResponse('Unauthorized.', ['error' => 'Unauthorized'],401);
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
