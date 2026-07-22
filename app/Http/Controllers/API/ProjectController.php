<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Project;

class ProjectController extends Controller
{
    // Show All Projects
    public function Show(Request $req){
        $data = Project::with('Type')->get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Projects
    public function Insert(Request $req){
        $req->validate([
            "name" => 'required',
            "client" => 'required',
            "location" => 'required',
            "type_id" => 'required',
            "year" => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            "details" => 'nullable',
            "status" => 'required',
        ]);

        $imageNames = [];

        if ($req->hasFile('images')) {

            foreach ($req->file('images') as $image) {

                $fileName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

                $image->move(public_path('projects'), $fileName);

                $imageNames[] = $fileName;
            }
        }

        $insert = Project::create([
            "name" => $req->name,
            "slug" => Str::slug($req->name),
            "client" => $req->client,
            "location" => $req->location,
            "year" => $req->year,
            "type_id" => $req->type_id,
            "image" => $imageNames,
            "details" => $req->details,
            "status" => $req->status,
        ]);

        $data = Project::findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'Project Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Projects
    public function Update(Request $req){
        $data = Project::findOrFail($req->id);

        $req->validate([
            "name" => 'required',
            "client" => 'required',
            "location" => 'required',
            "type_id" => 'required',
            "year" => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        $images = $data->image;

        if($req->removed_images){

            $removed = json_decode($req->removed_images);

            foreach($removed as $img){

                if(file_exists(public_path('projects/'.$img))){
                    unlink(public_path('projects/'.$img));
                }

                $images = array_values(array_diff($images,[$img]));
            }
        }

        if($req->hasFile('images')){

            foreach($req->file('images') as $image){

                $name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

                $image->move(public_path('projects'),$name);

                $images[] = $name;
            }

        }


        $data->update([
            "name" => $req->name,
            "slug" => Str::slug($req->name),
            "client" => $req->client,
            "location" => $req->location,
            "year" => $req->year,
            "type_id" => $req->type_id,
            "image" => $images,
            "details" => $req->details,
            "status" => $req->status,
        ]);

        $updatedData = Project::with('Type')->findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'Project Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Projects
    public function Delete(Request $req){
        $data = Project::findOrFail($req->id)->delete();

        return response()->json([
            'status'=> true,
            'message' => 'Project Details Deleted Successfully',
        ], 200); 
    } // End Method
}
