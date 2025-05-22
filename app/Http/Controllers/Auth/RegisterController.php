<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\RegisterService;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $request->validated();
        $service = new RegisterService;
        $newUser = $service->register($request); 
        return response()->json($newUser);
    }
}
