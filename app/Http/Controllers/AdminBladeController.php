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
    
    
    /////////////////////////// --------------- Services Methods start---------- //////////////////////////
    public function Services(Request $req){
        $name = "Service";
        $js = "service";
        if ($req->ajax()) {
            return view('admin.services.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.services.main', compact('name', 'js'));
        }
    } // End Method
    
    
    /////////////////////////// --------------- Projects Methods start---------- //////////////////////////
    public function Projects(Request $req){
        $name = "Project";
        $js = "project";
        if ($req->ajax()) {
            return view('admin.projects.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.projects.main', compact('name', 'js'));
        }
    } // End Method
    
    
    /////////////////////////// --------------- Settings Methods start---------- //////////////////////////
    public function Settings(Request $req){
        $name = "Settings";
        $js = "setting";
        if ($req->ajax()) {
            return view('admin.settings.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.settings.main', compact('name', 'js'));
        }
    } // End Method
}
