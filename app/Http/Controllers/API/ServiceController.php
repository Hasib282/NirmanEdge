<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    // Show All Services
    public function Show(Request $req){
        $data = Service::get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Services
    public function Insert(Request $req){
        $req->validate([
            "title" => 'required',
            "details" => 'required',
            "icon" => 'required',
        ]);

        $insert = Service::create([
            "title" => $req->title,
            "details" => $req->details,
            "icon" => $req->icon,
            "isproject" => $req->isproject ?? 0,
        ]);

        $data = Service::findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'Service Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Services
    public function Update(Request $req){
        $data = Service::findOrFail($req->id);

        $req->validate([
            "title" => 'required',
            "details" => 'required',
            "icon" => 'required',
        ]);


        $data->update([
            "title" => $req->title,
            "details" => $req->details,
            "icon" => $req->icon,
            "isproject" => $req->isproject ?? 0,
        ]);

        $updatedData = Service::findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'Service Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Services
    public function Delete(Request $req){
        $data = Service::findOrFail($req->id)->delete();

        return response()->json([
            'status'=> true,
            'message' => 'Service Details Deleted Successfully',
        ], 200); 
    } // End Method



    // Get All Services Data
    public function GetData(Request $req){
        $data = Service::orderBy('title')->where('title', 'like', $req->service . '%')->where('isProject', 1)->get();

        $list = "<ul>";
            if($data->count() > 0){
                foreach($data as $index => $item) {
                    $list .= '<li tabindex="' . ($index + 1) . '" data-id="'.$item->id.'">'.$item->title.'</li>';
                }
            }
            else{
                $list .= '<li>No Data Found</li>';
            }
        $list .= "</ul>";

        return $list;
    } // End Method
}
