<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBladeController extends Controller
{
    /////////////////////////// --------------- Users Methods start---------- //////////////////////////
    public function Users(Request $req){
        $name = "User";
        $js = "user";
        if ($req->ajax()) {
            return view('admin.users.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.users.main', compact('name', 'js'));
        }
    } // End Method
}
