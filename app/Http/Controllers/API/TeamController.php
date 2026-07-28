<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
    // Show All Teams
    public function Show(Request $req){
        $data = Team::with('Category')->get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Teams
    public function Insert(Request $req){
        $req->validate([
            "name" => 'required',
            "designation" => 'required',
            "detail" => 'required',
            "category_id" => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($req->hasFile('image')) {

            $image = $req->file('image');

            $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

            $imageName = $req->file('image')->storeAs('teams',$imageName,'public');
        }

        $insert = Team::create([
            "name" => $req->name,
            "designation" => $req->designation,
            "designation" => $req->designation,
            "category_id" => $req->category_id,
            "management_post" => $req->management_post,
            "details" => $req->detail,
            "image" => $imageName,
        ]);

        $data = Team::with('Category')->findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'Team Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Teams
    public function Update(Request $req){
        $data = Team::findOrFail($req->id);

        $req->validate([
            "name" => 'required',
            "designation" => 'required',
            "details" => 'required',
            "category_id" => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $data->image;

        if ($req->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($imageName);

            // Upload new image
            $image = $req->file('image');

            $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

            $imageName = $req->file('image')->storeAs('teams',$imageName,'public');
        }


        $data->update([
            "name" => $req->name,
            "designation" => $req->designation,
            "designation" => $req->designation,
            "management_post" => $req->management_post,
            "details" => $req->details,
            "category_id" => $req->category_id,
            "image" => $imageName,
        ]);

        $updatedData = Team::with('Category')->findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'Team Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Teams
    public function Delete(Request $req){
        $data = Team::findOrFail($req->id);

        // Delete old image
        Storage::disk('public')->delete($data->image);

        $data->delete();

        return response()->json([
            'status'=> true,
            'message' => 'Team Details Deleted Successfully',
        ], 200); 
    } // End Method
}
