<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\User;

class UserController extends Controller
{
    // Show All Users
    public function Show(Request $req){
        $data = User::get();

        return response()->json([
            'status'=> true,
            'data' => $data,
        ], 200);
    } // End Method



    // Insert Users
    public function Insert(Request $req){
        $req->validate([
            "name" => 'required',
            "email" => 'required|email|unique:mysql.users,email',
            'password' => 'required|confirmed',
        ]);

        $insert = User::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => $req->password
        ]);

        $data = User::findOrFail($insert->id);

        return response()->json([
            'status'=> true,
            'message' => 'User Details Added Successfully',
            "data" => $data,
        ], 200);  
    } // End Method



    // Update Users
    public function Update(Request $req){
        $data = User::findOrFail($req->id);

        $req->validate([
            "name" => 'required',
            "email" => ['required','email',Rule::unique('users', 'email')->ignore($data->id, 'id')],
        ]);


        $data->update([
            "name" => $req->name,
            "email" => $req->email,
            "updated_at" => now(),
        ]);

        $updatedData = User::findOrFail($req->id);

        return response()->json([
            'status'=>true,
            'message' => 'User Details Updated Successfully',
            "updatedData" => $updatedData,
        ], 200); 
    } // End Method



    // Delete Users
    public function Delete(Request $req){
        $data = User::findOrFail($req->id)->delete();

        return response()->json([
            'status'=> true,
            'message' => 'User Details Deleted Successfully',
        ], 200); 
    } // End Method
}
