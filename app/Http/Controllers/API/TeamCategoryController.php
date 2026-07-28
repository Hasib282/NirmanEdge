<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TeamCategory;

class TeamCategoryController extends Controller
{
    // Show All Team Categories
    public function Show(Request $req){
        $data = TeamCategory::get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Team Categories
    public function Insert(Request $req){
        $req->validate([
            "name" => 'required',
        ]);

        $insert = TeamCategory::create([
            "name" => $req->name,
        ]);

        $data = TeamCategory::findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'Team Category Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Team Categories
    public function Update(Request $req){
        $data = TeamCategory::findOrFail($req->id);

        $req->validate([
            "name" => 'required',
        ]);


        $data->update([
            "name" => $req->name,
        ]);

        $updatedData = TeamCategory::findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'Team Category Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Team Categories
    public function Delete(Request $req){
        $data = TeamCategory::findOrFail($req->id)->delete();

        return response()->json([
            'status'=> true,
            'message' => 'Team Category Details Deleted Successfully',
        ], 200); 
    } // End Method



    // Get All Team Categories Data
    public function GetData(Request $req){
        $data = TeamCategory::orderBy('name')->where('name', 'like', $req->category . '%')->get();

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
