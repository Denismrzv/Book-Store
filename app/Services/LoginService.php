<?php

namespace App\Services;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginService
{
    public function login(LoginUserRequest $request): ?User
    {
      
       if(Auth::attempt([
        'email'=>$request->email,
        'password'=>$request->password
       ],$request->rememberMe??false))
       {
        $request->session()->regenerate();
        return Auth::user();
       }

       return null;
    }
}