<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   public function log_out(){

        Auth::logout();
        return redirect('/login');
    }

}
