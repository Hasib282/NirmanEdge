<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

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
    
    
    /////////////////////////// --------------- Project Types Methods start---------- //////////////////////////
    public function ProjectTypes(Request $req){
        $name = "Project Type";
        $js = "admin/project_type";
        if ($req->ajax()) {
            return view('admin.single_input.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.single_input.main', compact('name', 'js'));
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
    
    
    /////////////////////////// --------------- Team Category Methods start---------- //////////////////////////
    public function TeamCategory(Request $req){
        $name = "Team Category";
        $js = "admin/team_category";
        if ($req->ajax()) {
            return view('admin.single_input.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.single_input.main', compact('name', 'js'));
        }
    } // End Method
    
    
    /////////////////////////// --------------- Teams Methods start---------- //////////////////////////
    public function Teams(Request $req){
        $name = "Team Member";
        $js = "admin/teams";
        if ($req->ajax()) {
            return view('admin.teams.ajax', compact('name', 'js'));
        }
        else{
            return view('admin.teams.main', compact('name', 'js'));
        }
    } // End Method
    
    
    /////////////////////////// --------------- Settings Methods start---------- //////////////////////////
    public function Settings(Request $req){
        $data = Setting::findOrFail(1);
        $name = "General Settings";
        $js = "setting";
        if ($req->ajax()) {
            return view('admin.settings.ajax', compact('name', 'js', 'data'));
        }
        else{
            return view('admin.settings.main', compact('name', 'js', 'data'));
        }
    } // End Method
}
