<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\LoginService;


class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $request->validated();
        $service = new LoginService;
        $user = $service->login($request);
        
        if($user){return response()->json($user);}
        return response()->json([
            'status' => 'error',
            'message' => 'wrong credentials'
        ],422);
        
    }
}
