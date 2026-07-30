<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamCategory;

class FrontendController extends Controller
{
    /////////////////////////// --------------- Home start---------- //////////////////////////
    public function Home(){
        $projects = Project::latest()->take(6)->get();

        return view('user.home', compact('projects'));
    } // End Method
    
    
    /////////////////////////// --------------- About start---------- //////////////////////////
    public function About(){
        $teamcategory = TeamCategory::with('Team')->get();
        return view('user.about', compact('teamcategory'));
    } // End Method
    
    
    /////////////////////////// --------------- Contact us start---------- //////////////////////////
    public function ContactUs(){
        return view('user.contactus');
    } // End Method
    
    
    /////////////////////////// --------------- Services start---------- //////////////////////////
    public function Services(){
        $services = Service::all();

        return view('user.services', compact('services'));
    } // End Method
    
    
    /////////////////////////// --------------- Projects start---------- //////////////////////////
    public function Projects(){
        $projects = Project::all();

        return view('user.projects', compact('projects'));
    } // End Method
    
    
    /////////////////////////// --------------- Project Details start---------- //////////////////////////
    public function ProjectDetails(Request $req, $slug){
        $data = Project::with('type')->where('slug', $slug)->first();

        return view('user.project_details', compact('data'));
    } // End Method


    /////////////////////////// --------------- Contact us start---------- //////////////////////////
    public function WhyUs(){
        return view('user.whyus');
    } // End Method
}
