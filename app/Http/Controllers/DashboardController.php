<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']); //only auth user and verified user can access this controller
    }

    public function index(){
        return view('dashboard');
    }
}
