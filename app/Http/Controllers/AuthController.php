<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show Login Page
    public function login(Request $req){
        return view('admin.auth.login');
    } // End Method

    
    // Show Dashboard
    public function Dashboard(){
        return view('layouts.admin.layout');
    } // End Method
}
