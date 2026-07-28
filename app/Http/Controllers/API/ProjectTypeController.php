<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ptype;

class ProjectTypeController extends Controller
{
    // Show All Project types
    public function Show(Request $req){
        $data = Ptype::get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Project types
    public function Insert(Request $req){
        $req->validate([
            "name" => 'required',
        ]);

        $insert = Ptype::create([
            "name" => $req->name,
        ]);

        $data = Ptype::findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'Project type Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Project types
    public function Update(Request $req){
        $data = Ptype::findOrFail($req->id);

        $req->validate([
            "name" => 'required',
        ]);


        $data->update([
            "name" => $req->name,
        ]);

        $updatedData = Ptype::findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'Project type Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Project types
    public function Delete(Request $req){
        $data = Ptype::findOrFail($req->id)->delete();

        return response()->json([
            'status'=> true,
            'message' => 'Project type Details Deleted Successfully',
        ], 200); 
    } // End Method



    // Get All Project types Data
    public function GetData(Request $req){
        $data = Ptype::orderBy('name')->where('name', 'like', $req->type . '%')->get();

        $list = "<ul>";
            if($data->count() > 0){
                foreach($data as $index => $item) {
                    $list .= '<li tabindex="' . ($index + 1) . '" data-id="'.$item->id.'">'.$item->name.'</li>';
                }
            }
            else{
                $list .= '<li>No Data Found</li>';
            }
        $list .= "</ul>";

        return $list;
    } // End Method
}
