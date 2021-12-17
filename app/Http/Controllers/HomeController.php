<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Area;

class HomeController extends Controller
{
    public function index(){
        $division = Division::all();
        // dd($division);
        return view('welcome',compact('division'));
    }

    public function get_district_data(Request $request){
        // dd($request->all());
        $district = District::where('division_id', $request->getdivision)->get();
        
        return response()->json(array('district' => $district));
    }

    public function get_area(Request $request){
        // dd($request->all());
        $area = Area::where('district_id', $request->getdistrict)->get();
        // dd($area);
        return response()->json(array('area' => $area));

    }
}
