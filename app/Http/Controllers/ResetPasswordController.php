<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    // Show Reset Form
    public function ResetPassword(Request $req){
        $token = $req->token;
        $passwordReset = DB::connection('mysql')->table('password_reset_tokens')->where('email', $req->email)->first();

        if (!$passwordReset) {
            return redirect()->route('login')->withErrors(['message' => 'Your Password reset token is expired.']);
        }

        return view('admin.auth.resetPassword')->with( ['token' => $token, 'email' => $req->email] );
    } // End Method
}
