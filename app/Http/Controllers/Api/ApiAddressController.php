<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;

class ApiAddressController extends Controller
{
    public function getProvince(){
        $province =Province::all();
        return response()->json($province);

    }
    public function getCity(Request $request){
        $city =City::where('province_id',$request->province_id)->get();
        return response()->json($city);

    }

    public function getBarangay(Request $request){
        $barangay =Barangay::where('city_id',$request->city_id)->get();
        return response()->json($barangay);

    }

    public function getAllProvince(){
        $province =Province::all();
        return response()->json($province);
    }

    public function getAllCity(){
        $city =City::all();
        return response()->json($city);
    }

    public function getAllBarangay(){
        $barangay =Barangay::all();
        return response()->json($barangay);
    }

}
