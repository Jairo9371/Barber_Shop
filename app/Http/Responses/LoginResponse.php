<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    
     
    public function toResponse($request)

    {
        if(Auth::user()){
            return redirect()->route('inicio.index');

        }
        
    }
}
