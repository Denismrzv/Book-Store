<?php

namespace App\Services;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(RegisterUserRequest $request): User
    {
       $user =  User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
       ]);

       Auth::login($user,$request->rememberMe ?? false);
       return $user;
}
}