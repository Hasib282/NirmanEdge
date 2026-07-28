<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingsController extends Controller
{
    public function Insert(Request $req){
        $setting = Setting::first();

        $req->validate([
            "title" => 'required',
            "name" => 'required',
            "phone1" => 'required',
            "email1" => 'required',
        ]);

        $logoName = $setting->logo;

        if ($req->hasFile('logo')) {
            // Delete old logo
            Storage::disk('public')->delete($logoName);

            // Upload new logo
            $logo = $req->file('logo');

            $logoName = 'logo.'.$logo->getClientOriginalExtension();

            $logoName = $req->file('logo')->storeAs('logo',$logoName,'public');
        }

        $setting->Update([
            "title" => $req->title,
            "name" => $req->name,
            "phone1" => $req->phone1,
            "phone2" => $req->phone2,
            "email1" => $req->email1,
            "email2" => $req->email2,
            "address" => $req->address,
            "develop" => $req->develop,
            "logo" => $logoName,
        ]);

        Cache::forget('settings');

        return response()->json([
            'status'=>true,
            'message' => 'Setting Details Updated Successfully',
        ], 200); 
    }
}
